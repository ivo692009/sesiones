
<?php
session_start(); 
if(isset($_SESSION['username'])){
    header("Location: inicio.php"); //redirect
    die();
}
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <title>Login</title>

        <meta charset = "utf-8">
    </head>

    <body>

        <h1>Login de Usuarios</h1>
        <hr/>

        <form action="login.php" method="post" >

            <label>Nombre Usuario:</label><br>
            <input name="username" type="text" id="username" required>
            <br><br>

            <label>Password:</label><br>
            <input name="password" type="password" id="password" required>
            <br><br>

            <input type="submit" name="Submit" value="LOGIN">

        </form>
         <label>Registrarse</label><br>
         <a href="login_alta.php">Registrarse</a><br><br>

    </body>
</html>