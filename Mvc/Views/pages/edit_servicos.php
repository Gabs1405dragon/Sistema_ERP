<?php  
 if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $servicos = \Models\HomeModel::select('servicos','id = ?',array($id));
}else{
    echo '<div class="erro" >Você precisa passar o parametro ID</div>';
    die();
}
$sql = \MySql::connect()->prepare("SELECT * FROM `servicos` WHERE id = ? ");
$sql->execute(array($_GET['id']));
$servicos = $sql->fetch();
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Alterar o seu serviço!</h2>
           <form method="post">
           <div class="wrap__input">
                   <label for="">Serviço:</label>
                   <textarea name="edit_servico" ><?php echo $servicos['servico']; ?></textarea>
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                   <input type="hidden" name="order_id" value="0" >
                   <input type="hidden" name="nome_tabela" value="servicos" >
                   <input type="submit" name="edit_alterar" value="Alterar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->