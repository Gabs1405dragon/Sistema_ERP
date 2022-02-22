<?php  
 if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $categoria = \Models\HomeModel::select('categoria','id = ?',array($id));
}else{
    echo '<div class="erro" >Você precisa passar o parametro ID</div>';
    die();
}
$sql = \MySql::connect()->prepare("SELECT * FROM `categoria` WHERE id = ? ");
$sql->execute(array($_GET['id']));
$categoria = $sql->fetch();
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Alterar categoria!</h2>
           <form method="post">
               
               <div class="wrap__input">
                   <label for="">Editar categoria:</label>
                   <input type="text" value="<?php echo $categoria['nome']; ?>" name="edit_nome" >
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <input type="hidden" name="slug" value="-" >
                   <input type="hidden" name="order_id" value="0" >
                   <input type="hidden" name="nome_tabela" value="servicos" >
                   <input type="submit" name="edit_categoria" value="Editar Categoria!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->