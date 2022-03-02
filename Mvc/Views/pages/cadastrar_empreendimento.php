<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Cadastrar os empreendimento !</h2>
           <form method="post" enctype="multipart/form-data">
               
               <div class="wrap__input">
                   <label for="">Nome:</label>
                   <input type="text" name="nome_empreendimento" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                    <label for="">Tipo</label>
                    <select name="tipo_empreendimento" id="">
                        <option value="Residencial">Residencial</option>
                        <option value="Comercial">Comercial</option>
                    </select>
               </div><!--wrap__input-->

               <div class="wrap__input">
                    <label for="">Preço</label>
                    <input formato="money" type="text" name="preco" >
               </div><!--input__input-->

               <div class="wrap__input">
                    <label for="">Imagem</label>
                    <input type="file" name="image" >
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <input type="submit" name="cadastrar_empreendimento" value="Cadastrar !" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->