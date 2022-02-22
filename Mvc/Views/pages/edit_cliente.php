<?php  
 if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $cliente = \Models\HomeModel::select('clientes','id = ?',array($id));
}else{
    echo '<div class="erro" >Você precisa passar o parametro ID</div>';
    die();
}

$sql = \MySql::connect()->prepare("SELECT * FROM `clientes` WHERE id = ? ");
$sql->execute(array($_GET['id']));
$clientes = $sql->fetch();
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Editar clientes!</h2>
           <form  method="post"  enctype="multipart/form-data">
               <div class="wrap__input">
                   <label for="">Nome:</label>
                   <input type="text" name="nome" value="<?php echo $clientes['nome'] ?>" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Email:</label>
                   <input type="email" value="<?php echo $clientes['email'] ?>" name="email" >
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
                   <input formato="cpf" value="<?php echo $clientes['cpf_cnpj'] ?>"  type="text" name="cpf" >
               </div><!--wrap__input-->

               <div style="display:none" ref="cnpj" class="wrap__input">
                   <label for="">CNPJ</label>
                   <input formato="cnpj" value="<?php echo $clientes['cpf_cnpj'] ?>"  type="text" name="cnpj" >
               </div><!--wrap__input-->

                <div class="wrap__input">
                   <label for="">imagem:</label>
                   <input type="file" name="imagem" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                  
                   <input type="submit" name="alterar_cliente" value="Atualizar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->