<?php
session_start(); 
if(!isset($_SESSION['username'])){
    header("Location: index.php"); //redirect
    die();
}


require "usuario.php";

error_reporting(E_ALL);
ini_set("display_errors", true);

//ID recivida por GET
$baja_id = $_GET["id"];

header('Content-Type: text/html; charset=UTF-8');

try {

    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "DELETE FROM clientes WHERE id = :id";

    //preparamos un statement con el sql anterior
    $stmt = $pdo->prepare($sql);

    //especificamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_OBJ); //podria ser PDO::FETCH_OBJ
    //Valor del Parametro :id
    $stmt->bindParam(':id', $baja_id);


    //ejecutamos la consulta
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
}

    header("Location: ok.php"); //redirect
    die();
