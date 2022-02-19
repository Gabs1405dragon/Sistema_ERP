<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Gabriel.H assis de souza" >
    <meta name="description" content="um sistema de login" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       <div class="voltar"><a href="register">Cadastrar</a></div> 
    </section><!--form__login-->
</body>
</html>