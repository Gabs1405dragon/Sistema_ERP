<?php
session_start();

if(!isset($_SESSION['login'])){
    include('login.php');
}else{
    include('home.php');
}





?>