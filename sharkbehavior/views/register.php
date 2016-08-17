<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }

}
?>

<!-- register form -->
<form method="post" action="register.php" name="registerform">

    <!-- the user name input field uses a HTML5 pattern check -->
    <label>Nome completo: </label>
    <input  type="text"  name="user_name" required />
    <br> <br>
    <label> Usuário </label>
    <input type="text" name="user_login" required/>
    <br> <br>
    <label> Curso </label>
    <input type="text" name="user_curso" required/>
    <br> <br>
    <label> Matricula </label>
    <input type="text" name="user_matricula" required/>
    <br> <br>
    <!-- the email input field uses a HTML5 email type check -->
    <label>E-mail</label>
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />
    <br> <br>
    <label> Telefone </label>
    <input type="number" name="user_fone" required/>
    <br> <br>
    <label for="login_input_password_new">Senha (max. 6 caracteres)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_senha"  required autocomplete="off" />
    <br> <br>
    <label for="login_input_password_repeat">Repetir senha</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_senha_repeat"  required autocomplete="off" />
    <br> <br>
    <input type="submit"  name="register" value="Cadastrar" />

</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>
