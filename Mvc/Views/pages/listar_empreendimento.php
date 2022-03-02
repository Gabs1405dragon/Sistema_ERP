
    <section class="painel__right">
    <div class="box__wrap">
 
        <div class="box__content">
           <h2><i class="fa-solid fa-people-carry-box"></i> Lista de todos os empreendimentos!</h2>
           <?php  
         
          

            if(isset($_GET['delete'])){
                $id = (int)$_GET['delete'];
                $imagens = \MySql::connect()->prepare("SELECT * FROM `empreendimento` WHERE order_id = $id");
                $imagens->execute();
                $imagens = $imagens->fetchAll();
                @unlink(BASE_DIR_PAINEL.'uploads/'.$value['imagem']);

                $imoveis = \MySql::connect()->prepare("SELECT * FROM `imoveis` WHERE empreend_id = $id ");
                $imoveis->execute();
                $imoveis = $imoveis->fetchAll();
                foreach($imoveis as $value){
                    $imagem = \MySql::connect()->prepare("SELECT * FROM `imoveis_imagens` WHERE imovel_id = $value[id] ");
                    $imagem->execute();
                    $imagem = $imagem->fetchAll();
                    foreach($imagem as $value2){
                        @unlink(BASE_DIR_PAINEL.'uploads/'.$value2['imagem']);
                        \MySql::connect()->exec("DELETE FROM `imoveis_imagens` WHERE id = $value2[id] ");
                    }

                }

                \MySql::connect()->exec("DELETE FROM `imoveis` WHERE empreend_id = $id");
                \MySql::connect()->exec("DELETE FROM `empreendimento` WHERE id = $id");

                echo '<div class="success" >O empreendimento foi deletado com sucesso!</div>';
            }

           ?>
           <div class="box__search">
               <h2><i class="fa-solid fa-magnifying-glass"></i> Realizar uma busca!</h2>
                <form method="post" >
                    <div class="wrap__input">
                        <input type="text" name="busca" placeholder="procure por: nome,preço ou tipo.." >
                    </div><!---wrap__input-->
                    <div class="wrap__input">
                        <input type="submit" name="acao" value="Buscar!" >
                    </div><!--wrap__input-->
                    
                </form>
           </div><!--box__search-->

           <?php 
           $query = '';
           if(isset($_POST['acao']) && $_POST['acao']  == 'Buscar!'){
                $nome = $_POST['busca'];
                $query = "WHERE nome LIKE '%$nome%' OR tipo LIKE '%$nome%' OR preco LIKE '%$nome%'";
           }
          

           $empreendimento = \MySql::connect()->prepare("SELECT * FROM `empreendimento` $query");
           $empreendimento->execute();
           $empreendimento = $empreendimento->fetchAll();
         if($query != ''){
            echo '<div><p>Foram encontrados <b>'.count($empreendimento).'</b> resultado(s)</p><div>';
           }
            foreach($empreendimento as $value){  
               ?>

          
           <div class="cliente__wraper">
                <div id="item?id=<?php echo $value['id'] ?>" class="cliente__box">
                    
                    <div class="produto__img w100">
                        <?php if($value['imagem'] == ''){?>
                            <h4><i class="fa-solid fa-box"></i></h4>
                       <?php }else{ ?>
                        <img src="<?php echo PATH_FULL ?>/uploads/<?php echo $value['imagem'] ?>" alt="">
                        <?php } ?>
                    </div><!--produto__img-->
                   
                  
                    <div class="body__cliente w100">
                        <h4><i class="fa-solid fa-file-signature"></i> Nome :</h4><p> <?php echo ucfirst($value['nome'])  ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-envelope"></i> Tipo:</h4><p><?php echo $value['tipo'] ?></p>
                        <div class=""></div>
                        
                        <a class="box__crud orange " style="color: white;" href="listar_empreendimento?delete=<?php echo $value['id']; ?>"><i class="fa-solid fa-bomb"></i> Excluir</a>
                        <a class="box__crud blue "  style="color: white;" href="visualizar_empreendimento?id=<?php echo $value['id']; ?>"><i class="fa-solid fa-eye"></i> Visualizar</a>
                    </div><!--body__cliente-->
                </div><!--cliente__box-->
           </div><!--cliente__wraper-->

           <?php } ?>
          <div class="clear"></div>
        </div><!--box__content-->
    </div>
</section>