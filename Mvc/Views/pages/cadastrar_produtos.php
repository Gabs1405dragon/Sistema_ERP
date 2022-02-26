<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
            
           <h2>Cadastrar produtos!</h2>
           <form  method="post"  enctype="multipart/form-data">
           <?php 
           if(isset($_POST['cadastrar_produto'])){
                $nome = $_POST['produto_nome'];
                $descricao = $_POST['descricao_produto'];
                $largura = $_POST['largura'];
                $altura = $_POST['altura'];
                $comprimento = $_POST['comprimento'];
                $quantidade = $_POST['quantidade'];
                $peso = $_POST['peso'];
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
                
            if(empty($nome) || empty($descricao) || empty($largura) || empty($altura) ){
                    echo '<div class="erro" >não é permitidos campos vazios</div>';
                }else{
                    $sql = \MySql::connect()->prepare("INSERT INTO `estoque` VALUES (null,?,?,?,?,?,?,?) ");
                    $sql->execute(array($nome,$descricao,$largura,$altura,$comprimento,$peso,$quantidade));
                    $lastId = \MySql::connect()->lastInsertId();
                    foreach($imagens as $key => $value){
                        \MySql::connect()->exec("INSERT INTO `estoque_imagem` VALUES (null,$lastId,'$novo_nome')");
                    };
                    echo '<div class="success" >Produto cadastrado com sucesso!</div>';
                    //header('location: cadastrar_produtos');
                }
            }
               

                

            /*
               
*/
               /*for($i = 0;$i < $amountFiles;$i++){
                    $imagemAltura = ['type'=>$_FILES['imagem']['type'][$i],'size'=>$_FILES['imagem']['size'][$i]];
                    if(\Models\HomeModel::imageValida($imagemAltura) == false){
                        $sucesso = false;
                        echo '<div class="erro" >uma das imagens selecionadas são inválidas!!</div>';
                        break;
                    }
                }*/

                /*if($sucesso){
                    echo '<div class="success" >produto cadastrado com sucesso!</div>';

                }*/


                
            } ?>
               <div class="wrap__input">
                   <label for="">Nome do produto:</label>
                   <input type="text" name="produto_nome" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descrição do produto:</label>
                   <textarea name="descricao_produto" ></textarea>
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Largura do produto:</label>
                   <input type="number" min="0" max="900" step="5" name="largura" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Altura do produto:</label>
                   <input type="number" min="0" max="900" step="5" name="altura" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Comprimento do produto:</label>
                   <input type="number" min="0" max="900" step="5" name="comprimento" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Peso do produto:</label>
                   <input type="number" min="0" max="900" step="5" name="peso" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Quantidade atual do produto:</label>
                   <input type="number" min="0" max="900" step="5" name="quantidade" >
               </div><!--wrap__input-->

                <div class="wrap__input">
                   <label for="">imagem:</label>
                   <input type="file" multiple name="image[]" />
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <input type="submit" name="cadastrar_produto" value="Cadastrar produto!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->