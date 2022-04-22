<?php

use Models\HomeModel;
define("PATH_FULL","http://localhost/teste/git/Mvc/Views/pages");
session_start();

include('../../../MySql.php');
include('../../../Models/HomeModel.php');
$homeModels = new HomeModel();

if(isset($_SESSION['login'])){
   

    sleep(2);
    $data['success'] = true;


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['pessoa_cliente'];
    $cpf = '';
    $cnpj = '';
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    };
    $imagem = '';

    if(empty($nome) || empty($email) || empty($tipo)){
        $data['success'] = false;
        $date['mensagem'] = "não é permitido enviar campos vazios";
    }

    if(isset($_FILES['imagem'])){
        if( \Models\HomeModel::imageValida($_FILES['imagem'])){
            $imagem = $_FILES['imagem'];
        }else{
            $imagem = '';
            $data['success'];
            $data['mensagem'] = "Você está tentando realizar um upload com imagem inválida.";
        }
    }

   
    
    if($data['success']){
        //$imagem = \Models\HomeModel::uploadFile($imagem);
        $sql = \MySql::connect()->prepare("INSERT INTO `clientes` VALUES (null,?,?,?,?,?) ");
        $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
        $sql->execute(array($nome,$email,$tipo,$dadoFinal,$imagem));
        
    }
    

    die(json_encode($data));
}else{
    die('voce não esta logado');
}

?>