<?php  
session_start();
if(isset($_SESSION['login'])){
    header('location: home.php');
};
include('MySql.php');
$mysql = new MySql();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma demonstração do GitHub</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    
    <section class="form__login" >
        <?php 
        if(isset($_POST['acao'])){
            $email = $_POST['login'];
            $senha = $_POST['senha'];
            if(empty($email) && empty($senha)){
                echo "<div class='erro' >Por Favor Preenchar todos os Campos!</div>";
            }else{
                $sql = $mysql->connect()->prepare("SELECT * FROM `usuarios` WHERE email = ? AND senha = ? ");
                $sql->execute(array($email,$senha));
                if($sql->rowCount() == 1){
                    $dados = $sql->fetch();
                    $_SESSION['login'] = $email;
                    $_SESSION['nome'] = $dados['nome'];
                    $_SESSION['cargo'] = $dados['cargo'];
                    header('location: home.php');
                    die();
                }else{
                    echo "<div class='erro' >Desculpe mais não tem nenhum usuario com esse email!</div>";
                }
            }
        }
        ?>
        <div class="container__form">
            <form method="post">
                <h2>Entre na tela de controle!</h2>
                <div class="wrap__form">
                     <label for="">Seu email:</label>
                     <input type="email" name="login"  >
                </div><!--wrap__form-->
                <div class="wrap__form">
                    <label for="">Sua senha:</label>
                     <input type="password" name="senha">
                </div><!--wrap__form-->
                <input type="submit" name="acao" value="Entrar"   >
            </form>
        </div><!--container__form-->
       <div class="voltar"><a href="register.php">Cadastrar</a></div> 
    </section><!--form__login-->
</body>
</html>