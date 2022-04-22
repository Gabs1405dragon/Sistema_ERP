<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Cadastrar um novo Módulo para o site!!</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Nome do Módulo:</label>
                   <input type="text" value="<?php echo \Models\ChatModel::pegarPost('nome'); ?>" name="nome" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Descrição do módulo:</label>
                   <textarea name="descricao" ></textarea>
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <input type="submit" name="cadastrar_modulo" value="Cadastrar Módulo!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->