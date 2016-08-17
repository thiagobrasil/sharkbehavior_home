<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- login form box -->
<form method="post" action="index.php" name="loginform">

    <label for="login_input_username">Usuário</label>
    <input id="login_input_username" class="login_input" type="text" name="user_login" required />
    <br> <br>
    <label for="login_input_username">Senha</label>
    <input type="password" name="user_senha" required />
    <br><br>
    <input type="submit"  name="login" value="Entrar" />
</form>
