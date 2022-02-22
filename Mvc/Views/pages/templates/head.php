<?php 

if(isset($_GET['excluir'])){
    session_unset();
    session_destroy();
    header('location: login');
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gabriel.H assis de souza" >
    <title><?php echo $arr['titulo']; ?></title>
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Estilos/Painel.css" >
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Estilos/Style.css" >
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Estilos/all.min.css" >
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Estilos/all.css" />
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/estilos/Cliente.css" />
</head>
<body>