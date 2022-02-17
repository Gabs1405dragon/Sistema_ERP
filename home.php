<?php 
sleep(1);
if(!isset($_SESSION['login'])){
header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controler</title>
    <link rel="stylesheet" href="Estilos/painel.css" >
</head>
<body>
    <aside class="painel__left" >
<div class="padding">
<div class="box__people"></div><!--box__people-->
    <div class="nome__usuario">
        <h2><?php echo $_SESSION['nome']; ?></h2>
        <p><?php echo $_SESSION['cargo']; ?></p>
    </div><!--nome__usuario-->
</div><!--padding-->
    <div class="menu__items">
        <li class="item__principal" >Cadastro</li>
        <li><a class="item__select" href="">Cadastrar Depoimento!</a></li>
        <li><a class="item__select" href="">Cadastrar Serviço!</a></li>
        <li class="item__principal" >Gestão</li>
        <li><a class="item__select" href="">Listar Depoimentos!</a></li>
        <li><a class="item__select" href="">Listar Serviços!</a></li>
        <li class="item__principal" >Administração do painel</li>
        <li><a class="item__select" href="">Editar Usuário!</a></li>
        <li><a class="item__select" href="">Adicionar Usuário!</a></li>
        <li class="item__principal" >Configuração Geral</li>
        <li><a class="item__select" href="">Editar Site!</a></li>
    </div><!--menu__items-->

    </aside>
    <section class="painel__right" >
        <header>
            <div class="sair"><p><a href="index.php">Pagina Inicial!</a> </p><a href="logout.php">Sair</a></div>
            <div class="clear"></div>
        </header>
        <div class="box__wrap">
            <div class="box__content">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="box__wrap w50">
            <div class="box__content ">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="box__wrap w50">
            <div class="box__content ">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="clear"></div>

        <div class="box__wrap ">
            <div class="box__content ">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="box__wrap w33">
            <div class="box__content ">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="box__wrap w33">
            <div class="box__content ">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="box__wrap w33">
            <div class="box__content ">
                <h1>titulo 1</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere expedita enim 
                    maiores iusto aliquam. Corrupti, quaerat! At vero, facere officiis
                     iste commodi id unde, quos maxime veniam voluptatem, voluptas perspiciatis.</p>
            </div><!--box__content-->
        </div><!--box__wrap-->

        <div class="clear"></div>

    </section><!--painel__right-->
    <div class="clear"></div>
    
    
</body>
</html>