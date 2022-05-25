<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Cadastrar clientes!</h2>
           <form method="post"  enctype="multipart/form-data">
               <div class="wrap__input">
                   <label for="">Nome:</label>
                   <input type="text" name="nome" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Email:</label>
                   <input type="email" name="email" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Tipo:</label>
                   <select name="pessoa_cliente" id="">
                       <option value="fisico">Fisico</option>
                       <option value="juridico">Jurídico</option>
                   </select>
               </div><!--wrap__input-->

               <div ref="cpf" class="wrap__input">
                   <label for="">CPF</label>
                   <input formato="cpf" placeholder="000.000.000-00"  type="text" name="cpf" >
               </div><!--wrap__input-->

               <div style="display:none" ref="cnpj" class="wrap__input">
                   <label for="">CNPJ</label>
                   <input formato="cnpj" placeholder="00.000.000/0000-00" type="text" name="cnpj" >
               </div><!--wrap__input-->

                <div class="wrap__input">
                   <label for="">imagem:</label>
                   <input type="file" name="imagem" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                  
                   <input type="submit" name="cadastrar_cliente" value="Cadastrar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->