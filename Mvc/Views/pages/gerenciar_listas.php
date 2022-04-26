<?php 
if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $deletar = \MySql::connect()->prepare("DELETE FROM listas_email WHERE id = ?");
    $deletar->execute(array($id));
    echo '<script>location.href="gerenciar_listas"</script>';
}
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
            <?php  
            if(isset($_POST['cadastrar_lista'])){
                $nome = $_POST['nome_lista'];
                if(empty($nome)){
                    echo '<div class="erro" >Preenchar o nome da lista!</div>';
                }else{
                    $sql = \MySql::connect()->prepare("INSERT INTO listas_email VALUES (null ,?)");
                    $sql->execute(array($nome));
                    echo '<script>location.href="gerenciar_listas"</script>';
                }
            }
            ?>
           <h2>Adicionar nova lista</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">Nome da lista:</label>
                   <input type="text" value="<?php echo \Models\ChatModel::pegarPost('nome_pessoa'); ?>" name="nome_lista" >
               </div><!--wrap__input-->
              
               <div class="wrap__input">
                   <input type="submit" name="cadastrar_lista" value="cadastrar" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->

        <div class="box__content">
           <h2>Listas disponiveis!</h2>
           <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Nome</td>
                       
                       <td>#</td>
                     
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $info =  \MySql::connect()->prepare("SELECT * FROM listas_email");
                   $info->execute();
                   $infos = $info->fetchAll();
                   
                   foreach($infos as $key => $value){?>
                   <tr>
                      
                       <td><?php echo $value['nome_lista'] ?></td>
                       
                       <td><a class="boxstyle" href="gerenciar_listas?excluir=<?php echo $value['id']; ?>" ><span class="trash" ><i class="fa-solid fa-trash-can"></i></span></a></td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
           </div><!--table__wrap-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->