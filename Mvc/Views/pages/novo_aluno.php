<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Cadastrar um novo aluno na plataforma!!</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Nome do aluno:</label>
                   <input type="text" value="<?php echo \Models\ChatModel::pegarPost('nome'); ?>" name="nome" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">E-mail:</label>
                   <input type="email" name="email" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Senha:</label>
                   <input type="password" name="senha" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <input type="submit" name="cadastrar_aluno" value="Cadastrar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->