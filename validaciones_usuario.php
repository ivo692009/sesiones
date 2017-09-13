<?php
require "usuario.php";


error_reporting(E_ALL);
ini_set("display_errors", true);

header('Content-Type: text/html; charset=UTF-8');

function validar_datos($username, $password1, $password2) {
    if (($username == null) || ($password1 == null || $password2 == null) || ($password1 != $password2)) {
        echo 'Datos invalidos';
        ?>
        <html><a href="login_alta.php">volver</a><br><br></html>
        <?php
        die();
    }
}

function validar_usuario($results, $username) {
    
        //Caracteres Permitidos.
        $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890"; 
        for ($i=0; $i<strlen($username); $i++){ 
            if (strpos($permitidos, substr($username,$i,1))===false){ 
                echo 'El Usuario Ingresado Es invalido';
                ?>
                <html><a href="login_alta.php">volver</a><br><br></html>
                <?php
                die();
                } 
        } 


    foreach ($results as $r) {
        if ($r->usu == $username) {
            echo 'El Usuario Ingresado ya Existe';
            ?>
            <html><a href="login_alta.php">volver</a><br><br></html>
            <?php
            die();
        }
    }
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "SELECT * FROM ussers";
    //preparamos un statement con el sql anterior
    $stmt = $pdo->prepare($sql);

    //especificamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_OBJ); //podria ser PDO::FETCH_OBJ
    //ejecutamos la consulta
    $stmt->execute();

    //recuperamos los datos en el array asoc.
    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
} finally {
    $pdo = null;
}