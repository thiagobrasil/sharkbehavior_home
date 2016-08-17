<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        $userLogin = $_POST['user_login'];
        $userSenha = $_POST['user_senha'];
        // check login form contents
        if (empty($userLogin)) {
            $this->errors[] = "Usuário vazio.";
        } elseif (empty($userSenha)) {
            $this->errors[] = "Senha vazia.";
        } elseif (!empty($userLogin) && !empty($userSenha)) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
              //  $userLogin = $this->db_connection->real_escape_string($_POST['user_login']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT USU_LOGIN, USU_EMAIL, USU_SENHA
                        FROM tbl_usuario
                      WHERE USU_LOGIN = '$userLogin' AND USU_SENHA = '$userSenha' ";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {
                    $result_row = $result_of_login_check->fetch_object();
                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_login'] = $result_row->USU_LOGIN;
                        $_SESSION['user_email'] = $result_row->USU_EMAIL;
                        $_SESSION['user_login_status'] = 1;

                } elseif($result_of_login_check->num_rows == 0) {
                        $this->errors[] = "Usuário inexistente";

                }else{
                    $this->errors[] = "Usuário ou senha iconrreta. Tente novamente.";
                }

            } else {
                $this->errors[] = "Problema ao conectar-se ao banco";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Você foi desconectado.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
