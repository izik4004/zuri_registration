<?php session_start();

session_unset();
session_destroy();
//login redirect
header("Location:login.php");