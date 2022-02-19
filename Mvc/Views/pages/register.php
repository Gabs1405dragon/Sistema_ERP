<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gabriel.H assis de souza" >
    <meta name="description" content="um sistema de login" >
    <title><?php echo $arr['titulo'] ?></title>
    <link rel="stylesheet" href="<?php echo PATH_FULL ?>/Estilos/style.css" />
</head>
<body>
    
    <section class="form__login" >
        <?php 
       
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
         <div class="voltar"><a  href="login">Voltar!</a></div>
    </section><!--form__login-->
</body>
</html>