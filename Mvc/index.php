<?php
ini_set('max_execution_time','0');
ini_set('memory_limit','-1');
ob_start();
session_start();
require('vendor/autoload.php');
include('Aplication.php');

$autoload = function($class){
    include($class.'.php');
};
spl_autoload_register($autoload);

$aplication = new Aplication();
$aplication::Execute();

ob_end_flush();


?>