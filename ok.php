<?php
session_start(); 
if(!isset($_SESSION['username'])){
    header("Location: index.php"); //redirect
    die();
}
	require "ok_vista.php";
