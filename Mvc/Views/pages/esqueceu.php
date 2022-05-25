<section class="form__login" >
     
     <div class="container__form">
         <form method="post" >
             <h2>Coloque o seu E-mail já existente.</h2>
            
             <div class="wrap__form">
                  <label for="">Seu email:</label>
                  <input  type="text" value="<?php echo \Models\HomeModel::pegarPost('login'); ?>" name="email"  />
             </div><!--wrap__form-->
      
            <input type="submit" name="insert_email" value="Enviar" />
             
         </form>
     </div><!--container__form-->
    <div class="voltar"><a href="login">Voltar</a> </div> 

 </section>