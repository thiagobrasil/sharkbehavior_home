<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Olá, <?php echo $_SESSION['user_login']; ?>. Você está Logado.



<br> <br> <br>

<a href="register.php">Cadastrar Bolsista</a>

<br> <br> <br>


<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a href="index.php?logout">Logout</a>
