<?php
if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $deletar = \MySql::connect()->prepare("DELETE FROM contatos WHERE id = ?");
    $deletar->execute(array($id));
    echo '<script>location.href="gerenciar_contatos"</script>';
}
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
            <?php  
            if(isset($_POST['cadastrar_contato'])){
                $lista = $_POST['lista_id'];
                $email = $_POST['email'];
                if(empty($email)){
                    echo '<div class="erro" >Preenchar o nome da lista!</div>';
                }else{
                    if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                        echo '<div class="erro" >E-mail invalido!</div>';
                    }else{
                        $sql = \MySql::connect()->prepare("INSERT INTO contatos VALUES (null ,?,?)");
                        $sql->execute(array($email,$lista));
                        echo '<script>location.href="gerenciar_contatos"</script>';
                    }
                 
                }
            }
            ?>
           <h2>Adicionar novo contato</h2>
           <form method="post">
               <div class="wrap__input">
                   <label for="">E-mail do contato:</label>
                   <input type="text" value="<?php echo \Models\ChatModel::pegarPost('email'); ?>" name="email" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Listas do contato:</label>
                   <select name="lista_id" id="">
                       <?php  
                       $lista = \MySql::connect()->prepare("SELECT * FROM listas_email");
                       $lista->execute();
                       $listas = $lista->fetchAll();
                       foreach($listas as $value){
                        echo '<option value="'.$value['id'].'">'.$value['nome_lista'].'</option>';
                       }
                       ?>
                   </select>
               </div><!--wrap__input-->
              
               <div class="wrap__input">
                   <input type="submit" name="cadastrar_contato" value="Adicionar contato" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->

        <div class="box__content">
           <h2>Listas disponiveis!</h2>
           <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Email</td>
                       <td>Listas</td>
                       <td>#</td>
                     
                   </tr>
               </thead>
               <tbody>
                   <?php
                    $info =  \MySql::connect()->prepare("SELECT * FROM contatos");
                    $info->execute();
                    $infos = $info->fetchAll();
                   
                   foreach($infos as $key => $value){
                   $lista1 =  \MySql::connect()->prepare("SELECT * FROM listas_email WHERE id = $value[lista_id]");
                   $lista1->execute();
                   $lista2 = $lista1->fetch();
                   ?>
                   <tr>
                      
                       <td><?php echo $value['email']; ?></td>
                       <td><?php echo $lista2['nome_lista']; ?></td>
                       <td><a class="boxstyle" href="gerenciar_contatos?excluir=<?php echo $value['id']; ?>" ><span class="trash" ><i class="fa-solid fa-trash-can"></i></span></a></td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
           </div><!--table__wrap-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->