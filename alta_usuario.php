<?php
require "usuario.php";
require "validaciones_usuario.php";

error_reporting(E_ALL);
ini_set("display_errors", true);

//Valores recividos por POST
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

header('Content-Type: text/html; charset=UTF-8');

try {
    //Validaciones

    validar_datos($username, $password1, $password2);
    validar_usuario($results, $username);
        
    
    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "INSERT INTO `ussers` (`usu`,`con`) 
            VALUES (:u, :c)";

    //preparamos un statement con el sql anterior
    $stmt = $pdo->prepare($sql);

    //especificamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_OBJ); //podria ser PDO::FETCH_OBJ
    //sustituimos los parametros con los valores reales
    $stmt->bindParam(':u', $username);
    $stmt->bindParam(':c', $password1);
    

    //ejecutamos la consulta
    $stmt->execute();

    session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

            header("Location: inicio.php"); //redirect
            die();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
}