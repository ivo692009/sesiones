<?php
session_start(); 
if(isset($_SESSION['username'])){
    header("Location: inicio.php"); //redirect
    die();
}
?>
<html lang="en">
    <head>
        <title>Registrarse</title>

        <meta charset = "utf-8">
    </head>

    <body>

        <h1>Registrar nuevo Usuario</h1>
        <hr />

        <form name="formulario" action="alta_usuario.php" method="post" >

            <label>Nombre Usuario:</label><br>
            <input name="username" type="text" id="username" required>
            <br><br>

            <label>Password:</label><br>
            <input name="password1" type="password" id="password1" required>
            <br><br>
            <label>Confirmar Password:</label><br>
            <input name="password2" type="password" id="password2" required>
            <br><br>

            <input type="submit" name="Submit" value="Registrar">

        </form>
        <label>Volver al Inicio</label><br>
        <a href="index.php">Inicio</a><br><br>
        <hr/>
    </body>
</html>