<?php
session_start();
if(isset($_SESSION['nome'])){
header('location: home.php');
}
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
        include('MySql.php');
        $mysql = new MySql();
        if(isset($_POST['cadastrar'])){
         $nomeCadastro = $_POST['cadastro-nome'];
         $emailCadastro = $_POST['cadastro-email'];
         $senhaCadastro = $_POST['cadastro-senha'];
         $cargo = $_POST['cargos'];
         if(empty($nomeCadastro) && empty($emailCadastro) && empty($senhaCadastro)){
            echo '<div class="erro" >Por Favor preenchar todos os campos do cadastro!!</div>';
         }else{
            $update = $mysql::connect()->prepare("INSERT INTO `usuarios` VALUES (null, ?,?,?,?)");
            $update->execute(array($nomeCadastro,$emailCadastro,$senhaCadastro,$cargo));
            echo '<div class="success" >você completou o cadastro com sucesso!</div>';
         }

        }
        ?>
        <div class="container__form">
            <form method="post">
                <h2>Entre na tela de controle!</h2>
                <div class="wrap__form">
                     <label for="">Seu Nome de Usuário:</label>
                     <input type="text" name="cadastro-nome"  >
                </div><!--wrap__form-->
                <div class="wrap__form">
                     <label for="">Seu email de cadastro:</label>
                     <input type="email" name="cadastro-email"  >
                </div><!--wrap__form-->
                <div class="wrap__form">
                    <select name="cargos" id="">
                        <option value="Administrador">Administrador</option>
                        <option value="Sub Administrador">Sub Administrador</option>
                        <option value="Normal">Normal</option>
                    </select>
                </div><!--wrap__form-->
                <div class="wrap__form">
                    <label for="">Crie a sua senha:</label>
                     <input type="password" name="cadastro-senha">
                </div><!--wrap__form-->
                <input type="submit" name="cadastrar" value="Cadastrar"   >
            </form>
        </div><!--container__form-->
         <div class="voltar"><a  href="index.php">Voltar!</a></div>
    </section><!--form__login-->
</body>
</html>