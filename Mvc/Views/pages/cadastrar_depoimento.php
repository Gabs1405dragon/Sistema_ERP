<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Cadastrar o depoimento para o site!</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Nome da pessoa:</label>
                   <input type="text" value="<?php echo \Models\ChatModel::pegarPost('nome_pessoa'); ?>" name="nome_pessoa" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Depoimento:</label>
                   <textarea name="depoimento" ></textarea>
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Data</label>
                   <input formato="data" type="text" name="date" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <input type="hidden" name="order_id" value="0" >
                   <input type="hidden" name="nome_tabela" value="depoimentos" >
                   <input type="submit" name="mandar" value="Postar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->