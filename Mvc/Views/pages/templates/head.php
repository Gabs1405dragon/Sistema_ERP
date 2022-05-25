<?php 

if(isset($_GET['excluir'])){
    setcookie('Painel',true,time()-(24*24*24*7),'/');
    session_destroy();
    echo'<script>location.href="login"</script>';
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
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Styles3/painel.css" >
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Styles3/style.css" >
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Styles3/all.min.css" >
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Styles3/all.css" />
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Styles3/jquery-ui.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css">
   
</head>
<body>