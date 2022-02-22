<?php  
 if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $depoimento = \Models\HomeModel::select('depoimentos','id = ?',array($id));
}else{
    echo '<div class="erro" >Você precisa passar o parametro ID</div>';
    die();
}
$sql = \MySql::connect()->prepare("SELECT * FROM `depoimentos` WHERE id = ? ");
$sql->execute(array($_GET['id']));
$depoimento = $sql->fetch();
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Editar o depoimento!</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Nome da pessoa:</label>
                   <input type="text" name="nome_pessoa" value="<?php echo $depoimento['nome']; ?>" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Depoimento:</label>
                   <textarea name="depoimento" ><?php echo $depoimento['depoimento']; ?></textarea>
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Data</label>
                   <input formato="data" type="text" name="date" value="<?php echo $depoimento['date'] ?>" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <input type="hidden" name="order_id" value="0" >
                   <input type="hidden" name="nome_tabela" value="depoimentos" >
                   <input type="submit" name="mandar" value="Editar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->