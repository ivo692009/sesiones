<?php
session_start(); 
if(isset($_SESSION['username'])){
    header("Location: inicio.php"); //redirect
    die();
}

require "login_alta_vista.php";