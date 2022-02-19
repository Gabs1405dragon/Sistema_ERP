<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Adicionar um novo usuario!</h2>
           <form method="post">
               
               <div class="wrap__input">
                   <label for="">Nome do novo usuario:</label>
                   <input type="text" name="nome"   >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Email:</label>
                   <input type="email" name="user"  >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">senha:</label>
                   <input type="password" name="new_password"  >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Cargo do usuário:</label>
                   <select name="cargos" id="">
                       <option value="Sub Administrador">Sub Administrador</option>
                       <option value="Normal">Normal</option>
                   </select>
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   
                   <input type="submit" name="create" value="Criar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->