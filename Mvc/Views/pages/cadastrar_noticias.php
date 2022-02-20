<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           
           <h2>Cadastrar a notícia do dia!</h2>
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
                   <input type="text" name="titulo">
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Notícia completa!:</label>
                   <textarea class="tinymce" name="noticia"></textarea>
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Data da notícia:</label>
                   <input formato="data" type="text" name="data" >
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