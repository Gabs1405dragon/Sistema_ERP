<?php  
$id = $_GET['id'];
$sql = \MySql::connect()->prepare("SELECT * FROM `empreendimento` WHERE id = $id");
$sql->execute();
$dados = $sql->fetch();

?>
    <section class="painel__right">
    <div class="box__wrap">
 
        <div class="box__content">
           <h2><i class="fa-solid fa-people-carry-box"></i> Visualizar empreendimentos!</h2>

           <div class="w40 padding">
                <div class="card__title"><h2><i class="fa-solid fa-image"></i> Imagem do empreendimento</h2></div>
                <div class="empreendimento__img">
                    <img src="<?php echo PATH_FULL ?>/uploads/<?php echo $dados['imagem'] ?>" alt="">
                </div><!--empreendimento__img-->
                
           </div>

           <div class="w60 padding">
                 <div class="card__title"><h2><i class="fa-solid fa-briefcase"></i> informações do empreendimento</h2></div>
                 <div class="empreendimento__list">
                     <li><i class="fa-solid fa-pen"></i> Nome do empreendimento: <?php echo ucfirst($dados['nome'])  ?></li>
                     <li><i class="fa-solid fa-earth-americas"></i> Tipo de empreendimento: <?php echo $dados['tipo'] ?></li>
                     <li><i class="fa-solid fa-money-check-dollar"></i> Preço do empreendimento: R$<?php echo $dados['preco'] ?></li>
                 </div><!--empreendimento__list-->
           </div>

          <div class="clear"></div>

           <h2><i class="fa-solid fa-people-carry-box"></i> Cadastrar imoveis</h2>

           <?php  
           if(isset($_POST['acao'])){
            $empreendID = $id;
            $nome = $_POST['nome'];
            $area = $_POST['area'];
            $preco = $_POST['preco'];

            $imagem = $_FILES['image'];
                
            $imagens = array();
            $quantidade_arquivos = count($_FILES['image']['name']);
            
             $sucesso = true;

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
        $sucesso = false;
        echo '<div class="erro">VocÊ precisa selecionar pelo menos uma imagem!</div>';
    }


        if($sucesso){
            for($i = 0;$i < $quantidade_arquivos;$i++){
                $imagemAtual = ['tmp_name'=>$_FILES['image']['tmp_name'][$i],
                'name'=>$_FILES['image']['name'][$i]
            ];
                $imagens[] = \Models\HomeModel::uploadFile($imagemAtual);
            }
            
        if(empty($nome) || empty($preco) || empty($area) ){
                echo '<div class="erro" >não é permitidos campos vazios</div>';
            }else{
                $sql = \MySql::connect()->prepare("INSERT INTO `imoveis` VALUES (null,?,?,?,?) ");
                $sql->execute(array($empreendID,$nome,$preco,$area));
                $lastId = \MySql::connect()->lastInsertId();
                \MySql::connect()->exec("INSERT INTO `imoveis_imagens` VALUES (null,$lastId,'$novo_nome')");
                echo '<div class="success" >Produto cadastrado com sucesso!</div>';
                //header('location: cadastrar_produtos');
            }
        }

            

           }
           ?>

           <form method="post" enctype="multipart/form-data" >
               <div class="wrap__input">
                   <label for="">Nome:</label>
                   <input type="text" name="nome" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Área:</label>
                   <input type="number" name="area" step="100" max="" min="0"   >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Preço:</label>
                   <input formato="money" type="text" name="preco" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Selecione imagens:</label>
                   <input type="file" name="image[]" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                  
                   <input type="submit" name="acao" value="Cadastrar imóvel!" >
               </div><!--wrap__input-->

           </form>

           <h2><i class="fa-solid fa-people-carry-box"></i> imóveis do empreendimento</h2>

<div class="table__wrap">

      <table>
     <thead>
         <tr>
             <td>Nome</td>
             <td>Preço</td>
             <td>Área</td>
             <td>*</td>
         </tr>
     </thead>
     <tbody>
         <?php
         $empreendID = $id;
        $sql = \MySql::connect()->prepare("SELECT * FROM `imoveis` WHERE empreend_Id = ?");
        $sql->execute(array($empreendID));
        $imoveis = $sql->fetchAll();
         
         foreach($imoveis as $value){?>
         <tr>
             <td><?php echo ucfirst($value['nome']) ; ?></td>
             <td><?php echo $value['preco']; ?></td>
             <td><?php echo $value['area']; ?>m²</td>
             <td><a href="edit_imovel?id=<?php echo $value['id'] ?>" >Visualizar</a></td>
         </tr>
         <?php } ?>
     </tbody>
 </table>
 </div><!--table__wrap-->

        </div><!--box__content-->
    </div>
</section>