<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           
           <h2>Editar o seu usuário!</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Editar nome:</label>
                   <input type="text" name="nome_edit" value="<?php echo $_SESSION['nome']; ?>" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Editar senha de usuário:</label>
                   <input type="password"   name="senha_edit">
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <input type="submit" name="acao" value="Editar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->