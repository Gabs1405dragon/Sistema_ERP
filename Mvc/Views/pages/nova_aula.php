<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Cadastrar Novas Aulas!!</h2>
           <form method="post" enctype="multipart/form-data" > 
               <div class="wrap__input">
                   <label for="">Nome da aula:</label>
                   <input type="text" value="<?php echo \Models\ChatModel::pegarPost('nome'); ?>" name="nome" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Selecione o módulo:</label>
                   <select name="modulo_id" >
                        <?php  
                        $modulo = \MySql::connect()->prepare("SELECT * FROM modulos ");
                        $modulo->execute();
                        $modulos = $modulo->fetchAll();
                        foreach($modulos as $key => $modulo){
                            echo '<option value="'.$modulo['id'].'" >'.$modulo['nome'].'</option>';
                        }
                        ?>
                   </select>
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <label for="">Link da aula:</label>
                   <input type="file" name="link_aula" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                   <input type="submit" name="cadastrar_aula" value="Cadastrar Aula!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->