<?php

/**
 * Class registration
 * handles the user registration
 */
class Registration
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
        $userName = $_POST['user_name'];
        $userLogin = $_POST['user_login'];
        $userCurso = $_POST['user_curso'];
        $userEmail = $_POST['user_email'];
        $userTelefone = $_POST['user_fone'];
        $userSenha = $_POST['user_senha'];
        $userSenhaRepeat = $_POST['user_senha_repeat'];
        $userMatricula = $_POST['user_matricula'];


        if (empty($userName)) {
            $this->errors[] = "Campo nome vazio";
        } elseif (empty($userSenha) || empty($userSenhaRepeat)) {
            $this->errors[] = "Campo senha vazio";
        } elseif ($userSenha != $userSenhaRepeat) {
            $this->errors[] = "Senhas incompativeis";
        } elseif (strlen($userSenha) > 6) {
            $this->errors[] = "A senha deve conter no maximo 6 caracteres";
        } elseif (strlen($userLogin) > 64 || strlen($userLogin) < 2) {
            $this->errors[] = "O campo Usuário deve conter no minino 5 caracteres";
        }elseif (empty($userEmail)) {
            $this->errors[] = "Campo email vazio";
        }elseif (empty($userCurso)) {
          $thi->errors[] = "Campo curso vazio";
        } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Formato de email invalido";
        } elseif (!empty($userName)
            && strlen($userLogin) <= 64
            && preg_match('/^[a-z\d]{2,64}$/i', $userLogin)
            && !empty($userEmail)
            && filter_var($userEmail, FILTER_VALIDATE_EMAIL)
            && !empty($userSenha)
            && !empty($userSenhaRepeat)
            && ($userSenha === $userSenhaRepeat)
            && !empty($userCurso)
            && !empty($userTelefone)
            && !empty($userMatricula)
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {
                // escaping, additionally removing everything that could be (html/javascript-) code
               //$userLogin = $this->db_connection->real_escape_string(strip_tags($_POST['user_login'], ENT_QUOTES));
               //$userEmail = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
              //  $userSenhaRepeat = password_hash($userSenha, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM tbl_usuario WHERE USU_LOGIN = '$userLogin' OR USU_EMAIL ='$userEmail';";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows) {
                    $this->errors[] = "Usuário já existe no Banco";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO tbl_usuario (USU_NOME,USU_TIPO,USU_MATRICULA, USU_CURSO, USU_EMAIL, USU_FONE, USU_ATIVO, USU_SENHA, USU_LOGIN)
                            VALUES('$userName', '0' , '$userMatricula','$userCurso', '$userEmail', '$userTelefone', '1', '$userSenhaRepeat', '$userLogin ');";
                    $query_new_user_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert){
                        $this->messages[] = "Bolsista cadastrado com Sucesso!";
                    } else {
                        $this->errors[] = "Desculpe, ocorrou um erro ao cadastrar";
                    }
                }
            } else {
                $this->errors[] = "Desculpe, Banco não conectado.";
            }
        }else {
         $this->errors[] = "Ocorreu um erro desconhecido";
          //echo  " . mysql_error($this) . \n";

        }
    }
}
