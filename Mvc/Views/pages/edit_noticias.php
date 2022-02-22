<?php  
 if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $servicos = \Models\HomeModel::select('noticias','id = ?',array($id));
}else{
    echo '<div class="erro" >Você precisa passar o parametro ID</div>';
    die();
}

$sql = \MySql::connect()->prepare("SELECT * FROM `noticias` WHERE id = ? ");
$sql->execute(array($_GET['id']));
$noticia = $sql->fetch();
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           
           <h2>Editar as noticias!</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Categoria:</label>
                   <select name="categoria_id" id="">
                       <?php 
                       $categoria = \Models\HomeModel::selectAll('categoria');
                       foreach($categoria as $key => $value){
                       ?>
                       <option <?php if($value['id'] == @$_POST['categoria_id']) echo 'selected'; ?> value="<?php echo $value['nome'] ?>"><?php echo $value['nome'] ?></option>
                       <?php }?>
                   </select>
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Titulo da sua notícia:</label>
                   <input type="text" value="<?php echo $noticia['titulo'] ?>" name="titulo">
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Notícia completa!:</label>
                   <textarea class="tinymce" name="noticia"><?php echo $noticia['conteudo'] ?></textarea>
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Data da notícia:</label>
                   <input formato="data" type="text" value="<?php echo $noticia['data'] ?>" name="data" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                  
                   <input type="hidden" name="slug" value="-" >
                   <input type="hidden" name="order_id" value="0" >
                   <input type="submit" name="acao_noticia" value="Publicar a noticia!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->