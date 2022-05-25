<?php  
$id = $_GET['id'];

?>
<section class="painel__right">
    <div class="box__wrap">
    <div class="box__content">
        <?php
        
if(isset($_GET['deletarImagem'])){
    $idImagem = $_GET['deletarImagem'];
    @unlink(BASE_DIR_PAINEL.'/uploads/'.$idImagem);
    \MySql::connect()->exec("DELETE FROM `imoveis_imagens` WHERE imagem = '$idImagem' ");
    echo '<div class="success" >A imagem foi deletada com sucesso!</div>';
    $pegaImagens = \MySql::connect()->prepare("SELECT * FROM `imoveis_imagens` WHERE id = $id ");
    $pegaImagens->execute();
    $pegaImagens = $pegaImagens->fetchAll();
}else if(isset($_GET['deletarImovel'])){
    $pegaImagens = \MySql::connect()->prepare("SELECT * FROM `imoveis_imagens` WHERE id = $id ");
    $pegaImagens->execute();
    $pegaImagens = $pegaImagens->fetchAll();
    foreach($pegaImagens as $value){
        @unlink(BASE_DIR_PAINEL.'/uploads/'.$idImagem);
    }    
    \MySql::connect()->exec("DELETE FROM `imoveis_imagens` WHERE imovel_id = '$id' ");
    \MySql::connect()->exec("DELETE FROM `imoveis` WHERE id = '$id' ");
    echo '<div class="success" >A imagem foi deletada com sucesso!</div>';
    
}

        ?>
     <div class="card__title"><h2><i class="fa-solid fa-people-carry-box"></i> <a href="listar_empreendimento" >Visualizar todos Empreendimentos!</a> > Editar o imovel!</h2></div> 
     


           <div class="card__title"><h2>editar produto!</h2></div><!--card__title-->
           <form method="post" enctype="multipart/form-data" >
             <?php  
             $sql = \MySql::connect()->prepare("SELECT * FROM `imoveis` WHERE id = $id ");
$sql->execute();
$imovel = $sql->fetchAll();
foreach($imovel as $value){
             ?>  
           <div class="wrap__input">
                   <label for="">Nome do imóvel:</label>
                   <input disabled type="text" value="<?php echo $value['nome']; ?>" name="produto_nome" >
               </div><!--wrap__input-->


               <div class="wrap__input">
                   <label for="">Preço do imóvel:</label>
                   <input  disabled type="text" value="<?php echo 'R$ '.$value['preco'] ?>" name="preco" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Área:</label>
                   <input disabled type="number" min="0" max="900" step="1" value="<?php echo $value['area'] ?>" name="altura" >
               </div><!--wrap__input-->


               <div class="wrap__input">
               <a class="box__crud orange " href="edit_imovel?id=<?php echo $id; ?>&deletarImovel">Excluir</a>
               </div><!--wrap__input-->
               <?php } ?>
           </form> 

           <div class="card__title"><h2><i class="fa-solid fa-people-carry-box"></i> Imagem do imóvel</h2></div> 
   <?php 
    $pegaImagens = \MySql::connect()->prepare("SELECT * FROM `imoveis_imagens` WHERE id = $id");
    $pegaImagens->execute();
    $pegaImagens = $pegaImagens->fetchAll();

    foreach($pegaImagens as $value){?>
    <div class="cliente__wraper">
                <div class="cliente__box">
                    
                    <div class="produto__img ">
                        <img src="<?php echo PATH_FULL ?>/uploads/<?php echo $value['imagem']; ?>" >
                    </div><!--produto__img-->

                    <div class="body__cliente ">
                        <a class="box__crud orange " href="edit_imovel?deletarImagem=<?php echo $value['imagem']; ?>&id=<?php echo $value['id'] ?>">Excluir</a>
                    </div><!--body__cliente-->

                    </div><!--cliente__box-->
           </div><!--cliente__wraper-->
           <div class="clear"></div>
        <?php } ?>
    

         </div><!--box__content-->
    </div><!--box__wrap-->
</section><!--painel__right-->  

