
    <section class="painel__right">
    <div class="box__wrap">
    <?php 
     if(isset($_GET['pendentes']) == false){ 
?>
        <div class="box__content">
           <h2><i class="fa-solid fa-people-carry-box"></i> Visualizar todos os produtos!</h2>
           <?php  
           if(isset($_POST['atualizar'])){
            $quantidade = $_POST['quantidade'];
            $produto_id = $_POST['produto_id'];
            if($quantidade < 0){
                echo '<div class="erro" >Você não pode atualizar a quantidade para igual ou menor a 0!</div>';
            }else{
                \MySql::connect()->exec("UPDATE `estoque` SET quantidade = $quantidade WHERE id = $produto_id ");
                echo '<div class="success" >Você atualizou a quantidade do produto com ID: <b>'.$produto_id.'</b></div>';
            }

           

           } $sql = \MySql::connect()->prepare("SELECT * FROM `estoque` WHERE quantidade = 0 ");
            $sql->execute();
            if($sql->rowCount() > 0){
                echo '<div class="alerta" ><i class="fa-solid fa-triangle-exclamation"></i> Você está com produtos em falta! clique <a style="color:white" href="visualizar_produtos?pendentes" >aqui!</a> para visualiza-los!</div>';
            }

            if(isset($_GET['delete'])){
                $id = (int)$_GET['delete'];
                $imagens = \MySql::connect()->prepare("SELECT * FROM `estoque_imagem` WHERE produto_id = $id");
                $imagens->execute();
                $imagens = $imagens->fetchAll();
                foreach($imagens as $key => $value){
                    @unlink(BASE_DIR_PAINEL.'uploads/'.$value['imagem']);
                }
                \MySql::connect()->exec("DELETE FROM `estoque_imagem` WHERE produto_id = $id");
                \MySql::connect()->exec("DELETE FROM `estoque` WHERE id = $id");
                echo '<div class="success" >O produto foi deletado com sucesso!</div>';
            }

           ?>
           <div class="box__search">
               <h2><i class="fa-solid fa-magnifying-glass"></i> Realizar uma busca!</h2>
                <form method="post" >
                    <div class="wrap__input">
                        <input type="text" name="busca" placeholder="procure por: nome,email ou cpf/cnpj..." >
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
                $query = "WHERE (nome LIKE '%$nome%' OR descricao LIKE '%$nome%')";
           }
           if($query == ''){
            $query2 = "WHERE quantidade > 0";
           }else{
               $query2 = "AND quantidade > 0";
           }
           $produto = \MySql::connect()->prepare("SELECT * FROM `estoque` $query $query2");
           $produto->execute();
           $produto = $produto->fetchAll();
           if($query != ''){
            echo '<div><p>Foram encontrados <b>'.count($produto).'</b> resultado(s)</p><div>';
           }
           
           foreach($produto as $key => $value){
                if($value['quantidade'] == '0'){
            continue;
           }
               $imagemSingle = \MySql::connect()->prepare("SELECT * FROM `estoque_imagem` WHERE produto_id = '$value[id]'");
               $imagemSingle->execute();
               @$imagemSingle = $imagemSingle->fetch()['imagem'];
               ?>

          
           <div class="cliente__wraper">
                <div class="cliente__box">
                    
                    <div class="produto__img w30">
                        <?php if($imagemSingle == ''){?>
                            <h4><i class="fa-solid fa-box"></i></h4>
                       <?php }else{ ?>
                        <img src="<?php echo PATH_FULL ?>/uploads/<?php echo $imagemSingle ?>" alt="">
                        <?php } ?>
                    </div><!--produto__img-->
                   
                  
                    <div class="body__cliente w70">
                        <h4><i class="fa-solid fa-file-signature"></i> Nome do produto:</h4><p> <?php echo $value['nome'] ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-envelope"></i> Descrição:</h4><p><?php echo $value['descricao'] ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-text-width"></i> Largura:</h4><p> <?php echo $value['largura'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-text-height"></i> Altura:</h4> <?php echo $value['altura'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-ruler-horizontal"></i> Comprimento:</h4> <?php echo $value['comprimento'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-ruler-horizontal"></i> Peso:</h4> <?php echo $value['peso'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-money-bill"></i> Preço: </h4>R$ <?php echo $value['preco'] ?>kg</p>
                        <div class=""></div>
                        <form method="post"  class="input__produto">
                            <h5><i class="fa-solid fa-arrow-up-9-1"></i> Quantidade atual:</h5>
                            <input type="number" max="100" min="0" step="1" name="quantidade" value="<?php echo $value['quantidade']; ?>" >
                            <input type="hidden" name="produto_id" value="<?php echo $value['id']; ?>"  />
                            <input type="submit" value="Atualizar" name="atualizar" >
                        </form>
                        <a class="box__crud green" href="edit_produto?id=<?php echo $value['id']; ?>">Editar</a>
                        <a class="box__crud orange " href="visualizar_produtos?delete=<?php echo $value['id']; ?>">Excluir</a>
                    </div><!--body__cliente-->
                </div><!--cliente__box-->
           </div><!--cliente__wraper-->
           
      <?php } ?>
          <div class="clear"></div>
        </div><!--box__content-->
<?php 
        }else{ 
    ?>
            <div class="box__content">
                <h2><i class="fa-solid fa-people-carry-box"></i> <a href="visualizar_produtos" >Visualizar todos os produtos!</a> > Produtos em estoque!</h2>
                <?php  
           if(isset($_POST['atualizar'])){
            $quantidade = $_POST['quantidade'];
            $produto_id = $_POST['produto_id'];
                if($quantidade < 0){
                    echo '<div class="erro" >Você não pode atualizar a quantidade para igual ou menor a 0!</div>';
                }else{
                    \MySql::connect()->exec("UPDATE `estoque` SET quantidade = $quantidade WHERE id = $produto_id ");
                    
                }
           } 

           ?>
                <?php 
         
           $produto = \MySql::connect()->prepare("SELECT * FROM `estoque` WHERE quantidade = 0 ");
           $produto->execute();
           $produto = $produto->fetchAll();
           if(count($produto) > 0){
                echo '<div class="alerta" >Todos os seus produtos listados estão em falta no seu estoque!</div>';
           }else{
            echo '<div class="success" >Tudo okay ,você não tem nenhum produto em falta!</div>';
           }
           
           foreach($produto as $key => $value){ 
               $imagemSingle = \MySql::connect()->prepare("SELECT * FROM `estoque_imagem` WHERE produto_id = '$value[id]'");
               $imagemSingle->execute();
               $imagemSingle = $imagemSingle->fetch()['imagem'];
               ?>

          
           <div class="cliente__wraper">
                <div class="cliente__box">
                    
                    <div class="produto__img w30">
                        <img src="<?php echo PATH_FULL ?>/uploads/<?php echo $imagemSingle ?>" alt="">
                    </div><!--produto__img-->
                   
                  
                    <div class="body__cliente w70">
                        <h4><i class="fa-solid fa-file-signature"></i> Nome do produto:</h4><p> <?php echo $value['nome'] ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-envelope"></i> Descrição:</h4><p><?php echo $value['descricao'] ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-text-width"></i> Largura:</h4><p> <?php echo $value['largura'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-text-height"></i> Altura:</h4> <?php echo $value['altura'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-ruler-horizontal"></i> Comprimento:</h4> <?php echo $value['comprimento'] ?>cm</p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-ruler-horizontal"></i> Peso:</h4> <?php echo $value['peso'] ?>kg</p>
                        <div class=""></div>
                        <form method="post"  class="input__produto">
                            <h5><i class="fa-solid fa-arrow-up-9-1"></i> Quantidade atual:</h5>
                            <input type="number" max="100" min="0" step="1" name="quantidade" value="<?php echo $value['quantidade']; ?>" >
                            <input type="hidden" name="produto_id" value="<?php echo $value['id']; ?>"  />
                            <input type="submit" value="Atualizar" name="atualizar" >
                        </form>
                        <a class="box__crud green" href="edit_produto?id=<?php echo $value['id']; ?>">Editar</a>
                        <a class="box__crud orange " href="visualizar_produtos?delete=<?php echo $value['id']; ?>">Excluir</a>
                    </div><!--body__cliente-->
                </div><!--cliente__box-->
           </div><!--cliente__wraper-->
           
      <?php } ?>
          <div class="clear"></div>

            </div>
        <?php }; ?>
        
    </div><!--box__wrap-->
    
</section><!--painel__right-->

