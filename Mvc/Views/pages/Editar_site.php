<?php
$config = \Models\HomeModel::select('config','id = ?',false);
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           
           <h2>Editar o site!</h2>
          
           <form method="post">
               <div class="wrap__input">
                   <label for="">Titulo do site:</label>
                   <input type="text" value="<?php echo $config['titulo']; ?>" name="titulo" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Nome do author do site:</label>
                   <input type="text" value="<?php echo $config['nome_author']; ?>" name="nome_author" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descrição do site:</label>
                   <textarea name="descricao" ><?php echo $config['descricao']; ?></textarea>
               </div><!--wrap__input-->
              
               <div class="wrap__input">
                   <label for="">Titulo do icone 1</label>
                   <input  type="text" value="<?php echo $config['titulo_icon1' ]; ?>" name="titulo_icon1" >
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <label for="">icone 1</label>
                   <input  type="text" value="<?php echo $config['icon1']; ?>" name="icon1" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descricao 1</label>
                   <textarea name="descricao1" ><?php echo $config['descricao1']; ?></textarea>
               </div><!--wrap__input-->
                <!---->
               <div class="wrap__input">
                   <label for="">Titulo do icone 2</label>
                   <input  type="text" value="<?php echo $config['titulo_icon2' ]; ?>" name="titulo_icon2" >
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <label for="">icone 2</label>
                   <input  type="text" value="<?php echo $config['icon2']; ?>" name="icon2" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descricao 2/label>
                   <textarea name="descricao2" ><?php echo $config['descricao2']; ?></textarea>
               </div><!--wrap__input-->
                <!---->
               <div class="wrap__input">
                   <label for="">Titulo do icone 3</label>
                   <input  type="text" value="<?php echo $config['titulo_icon3' ]; ?>" name="titulo_icon3" >
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <label for="">icone 3</label>
                   <input  type="text" value="<?php echo $config['icon3']; ?>" name="icon3" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descricao 3</label>
                   <textarea name="descricao3" ><?php echo $config['descricao3']; ?></textarea>
               </div><!--wrap__input-->
              
               <div class="wrap__input">
                   <input type="submit" name="site" value="Atualizar o site!" >
               </div><!--wrap__input-->
           </form> 
        
           
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->