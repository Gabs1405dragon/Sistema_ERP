<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Adicionar um novo usuario!</h2>
           <form method="post" enctype="multipart/form-data">
               
               <div class="wrap__input">
                   <label for="">Nome do novo usuario:</label>
                   <input type="text" name="nome" value="<?= \Models\HomeModel::pegarPost('nome')?>"   >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Email:</label>
                   <input type="email" name="user" value="<?= \Models\HomeModel::pegarPost('user')?>" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">senha:</label>
                   <input type="password" name="new_password"  >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Confirmar Senha:</label>
                   <input type="password" name="confSenha"  >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Cargo do usuário:</label>
                   <select name="cargos" id="">
                       <option value="Sub Administrador">Sub Administrador</option>
                       <option value="Normal">Normal</option>
                   </select>
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <label for="">Imagem do Novo Usuário</label>
                   <input type="file" name="imagem" >
               </div>

               <div class="wrap__input">
                   
                   <input type="submit" name="create" value="Criar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->