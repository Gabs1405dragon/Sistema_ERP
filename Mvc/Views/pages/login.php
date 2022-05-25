<?php  
 if(isset($_SESSION['id_email'])){
session_destroy();
 }
 ?>
<section class="form__login" >
     
     <div class="container__form">
         <form method="post" >
             <h2>Entre na tela de controle!</h2>
            
             <div class="wrap__form">
                  <label for="">Seu email:</label>
                  <input  type="email" value="<?php echo \Models\HomeModel::pegarPost('login'); ?>" name="login"  />
             </div><!--wrap__form-->
             <div class="wrap__form">
                 <label for="">Sua senha:</label>
                  <input type="password" name="senha" />
             </div><!--wrap__form-->
          
             
            <input type="submit" name="acao" value="Logar" />
             
         </form>
     </div><!--container__form-->
    <div class="voltar"><a href="register">Cadastrar</a> </div> 
    <div class="voltar"><a href="esqueceu">Esqueceu a senha??</a></div>
 </section> 