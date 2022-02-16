<?php
session_start();
if($_SESSION['login']){
    header('Location: home.php');
}else{
    header('Location: login.php');
}



?>