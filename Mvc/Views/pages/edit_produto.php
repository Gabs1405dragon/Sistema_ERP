<?php  
$id = $_GET['id'];
$produto = \MySql::connect()->prepare("SELECT * FROM `estoque` WHERE id = $id ");
$produto->execute();

if($produto->rowCount() == 0){
echo '<div class="erro" >o produto que você quer editar não existe</div>';
die();
}

$pegaImagens = \MySql::connect()->prepare("SELECT * FROM `estoque_imagem` WHERE produto_id = $id");
$pegaImagens->execute();
$pegaImagens = $pegaImagens->fetchAll();


$produto = $produto->fetch();


?>
<section class="painel__right">
    <div class="box__wrap">
    <div class="box__content">
        <?php
        
if(isset($_GET['deletarImagem'])){
    $idImagem = $_GET['deletarImagem'];
    @unlink(BASE_DIR_PAINEL.'/uploads/'.$idImagem);
    \MySql::connect()->exec("DELETE FROM `estoque_imagem` WHERE imagem = '$idImagem' ");
    echo '<div class="success" >A imagem foi deletada com sucesso!</div>';
    $pegaImagens = \MySql::connect()->prepare("SELECT * FROM `estoque_imagem` WHERE produto_id = $id ");
    $pegaImagens->execute();
    $pegaImagens = $pegaImagens->fetchAll();
}
        ?>
     <div class="card__title"><h2><i class="fa-solid fa-people-carry-box"></i> <a href="visualizar_produtos" >Visualizar todos os produtos!</a> > Editar o produto!</h2></div> 
     

           <?php  
           if(isset($_POST['atualizar_produto'])){
                $nome = $_POST['produto_nome'];
                $descricao = $_POST['descricao_produto'];
                $largura = $_POST['largura'];
                $altura = $_POST['altura'];
                $peso = $_POST['peso'];
                $comprimento = $_POST['comprimento'];
                $quantidade = $_POST['quantidade'];
                $sucesso = true;

                $imagens = array();
                $quantidade_arquivos = count($_FILES['image']['name']);
                
               

            if($_FILES['image']['name'][0] != ''){
             $tipo_permitidos = ['jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'];
            

                for($i = 0;$i < $quantidade_arquivos;$i++){
                    $imagemAtual = ['type'=>$_FILES['image']['type'][$i],
                    'size'=>$_FILES['image']['size'][$i]];
                    $extensao = pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
                if(in_array($extensao,$tipo_permitidos)){
                    $pasta = BASE_DIR_PAINEL.'uploads/';
                    $temporario = $_FILES['image']['tmp_name'][$i];
                    $novo_nome = uniqid().".$extensao";

                    if(move_uploaded_file($temporario,$pasta.$novo_nome)){
                        echo '<div class="success">Upload realizado!</div>';
                    }else{
                        $sucesso = false;
                        echo '<div class="erro" >falha no upload</div>';
                    }

                }else{
                    $sucesso = false;
                    echo '<div class="erro">tipo de arquivo não é permitido!</div>';
                }
            }

        }else{
           
            echo '<div class="erro">Você precisa selecionar pelo menos uma imagem!</div>';
        }


            if($sucesso){
                if($_FILES['image']['name'][0] != ''){
                    for($i = 0;$i < $quantidade_arquivos;$i++){
                        $imagemAtual = ['tmp_name'=>$_FILES['image']['tmp_name'][$i],'name'=>$_FILES['image']['name'][$i]];

                        $imagens[] = \Models\HomeModel::uploadFile($imagemAtual);
                    }
                    foreach($imagens as $key => $value){
                        \MySql::connect()->exec("INSERT INTO `estoque_imagem` VALUES (null,$id,'$novo_nome')");
                    };
                }

            if(empty($nome) || empty($descricao) || empty($largura) || empty($altura) ){
                    echo '<div class="erro" >não é permitidos campos vazios</div>';
                }else{
                    $sql = \MySql::connect()->prepare("UPDATE `estoque` SET nome = ?,descricao = ?,largura= ?,altura = ?,
                    comprimento = ?,peso=? ,quantidade = ? WHERE id = '$id' ");
                    $sql->execute(array($nome,$descricao,$largura,$altura,$comprimento,$peso,$quantidade));
                  
                    echo '<div class="success" >Produto cadastrado com sucesso!</div>';
                    $sql = \MySql::connect()->prepare("SELECT * FROM `estoque` WHERE id = ? ");
                    $sql->execute(array($id));
                    $produto = $sql->fetch();

                    
                    $pegaImagens = \MySql::connect()->prepare("SELECT * FROM `estoque_imagem` WHERE produto_id = $id");
                    $pegaImagens->execute();
                    $pegaImagens = $pegaImagens->fetchAll();
                    //header('location: cadastrar_produtos');
                }
            }

           }
           ?>

           <div class="card__title"><h2>editar produto!</h2></div><!--card__title-->
           <form method="post" enctype="multipart/form-data" >
           <div class="wrap__input">
                   <label for="">Nome do produto:</label>
                   <input type="text" value="<?php echo $produto['nome']; ?>" name="produto_nome" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descrição do produto:</label>
                   <textarea name="descricao_produto" ><?php echo $produto['descricao']; ?></textarea>
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Largura do produto:</label>
                   <input type="number" min="0" max="900" step="1" value="<?php echo $produto['largura'] ?>" name="largura" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Altura do produto:</label>
                   <input type="number" min="0" max="900" step="1" value="<?php echo $produto['altura'] ?>" name="altura" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Comprimento do produto:</label>
                   <input type="number" min="0" max="900" step="1" value="<?php echo $produto['comprimento'] ?>" name="comprimento" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Peso do produto:</label>
                   <input type="number" min="0" max="900" step="1" value="<?php echo $produto['peso'] ?>" name="peso" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Quantidade:</label>
                   <input type="number" min="0" max="900" step="1" value="<?php echo $produto['quantidade'] ?>" name="quantidade" >
               </div><!--wrap__input-->               

                <div class="wrap__input">
                   <label for="">imagem:</label>
                   <input type="file" multiple name="image[]" />
                 
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <input type="submit" name="atualizar_produto" value="Editar produto!" >
               </div><!--wrap__input-->
           </form> 

           <div class="card__title"><h2><i class="fa-solid fa-people-carry-box"></i> Imagem do Produto</h2></div> 
    <?php foreach($pegaImagens as $key => $value){ ?>
     <div class="cliente__wraper">

                <div class="cliente__box">
                    
                    <div class="produto__img ">
                        <img src="<?php echo PATH_FULL ?>/uploads/<?php echo $value['imagem']; ?>" >
                    </div><!--produto__img-->

                    <div class="body__cliente ">
                        <a class="box__crud orange " href="edit_produto?deletarImagem=<?php echo $value['imagem']; ?>&id=<?php echo $id ?>">Excluir</a>
                    </div><!--body__cliente-->

                </div><!--cliente__box-->
           </div><!--cliente__wraper-->
           <?php } ?>
           <div class="clear"></div>
 
    </div><!--box__content-->
    </div><!--box__wrap-->
</section><!--painel__right-->    

    