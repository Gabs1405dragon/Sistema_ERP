<?php
session_start();

include('Aplication.php');

$autoload = function($class){
    include($class.'.php');
};
spl_autoload_register($autoload);

$aplication = new Aplication();
$aplication::Execute();




?>