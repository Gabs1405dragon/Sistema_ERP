<?php  

$id = $_GET['id'];

$sql = \MySql::connect()->prepare("SELECT * FROM `clientes` WHERE id = ? ");
$sql->execute(array($_GET['id']));
$clientes = $sql->fetch();
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>Editar clientes!</h2>

           <form  method="post"  enctype="multipart/form-data">
               <div class="wrap__input">
                   <label for="">Nome:</label>
                   <input type="text" name="nome" value="<?php echo $clientes['nome'] ?>" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Email:</label>
                   <input type="email" value="<?php echo $clientes['email'] ?>" name="email" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Tipo:</label>
                   <select  name="pessoa_cliente" >
                       <option <?php if($clientes['tipo'] == "fisico"){ echo 'selected';} ?> value="fisico">Fisico</option>
                       <option <?php if($clientes['tipo'] == "juridico" ){ echo 'selected';} ?> value="juridico">Jurídico</option>
                   </select>
               </div><!--wrap__input-->

               <div <?php if($clientes['tipo'] == 'fisico'){ ?> style="display: block" <?php }else{ ?> style="display:none" <?php }; ?> ref="cpf" class="wrap__input">
                   <label for="">CPF</label>
                   <input  formato="cpf" value="<?php echo $clientes['cpf_cnpj'] ?>"  type="text" name="cpf" >
               </div><!--wrap__input-->

               <div <?php if($clientes['tipo'] == 'juridico'){ ?> style="display: block" <?php }else{ ?> style="display:none" <?php }; ?>  ref="cnpj" class="wrap__input">
                   <label for="">CNPJ</label>
                   <input formato="cnpj" value="<?php echo $clientes['cpf_cnpj'] ?>"  type="text" name="cnpj" >
               </div><!--wrap__input-->

                <div class="wrap__input">
                   <label for="">imagem:</label>
                   <input type="file" name="imagem" value="<?= $clientes['imagem']; ?>" >
               </div><!--wrap__input-->
               <div class="wrap__input">
                  
                   <input type="submit" name="alterar_cliente" value="Atualizar!" >
               </div><!--wrap__input-->
               <?php 
               if(isset($_POST['alterar_cliente'])){
                
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $tipo = $_POST['pessoa_cliente'];
                $cpf = '';
                $cnpj = '';
                if($tipo == 'fisico'){
                    $cpf = $_POST['cpf'];
                }else if($tipo == 'juridico'){
                    $cnpj = $_POST['cnpj'];
                };
                $imagem = $_FILES['imagem'];
                $success = true;
                $arquivo = explode('.',$imagem['name']);

                if($arquivo[sizeof($arquivo)-1] != 'jpg' && $arquivo[sizeof($arquivo)-1] != 'png' && $arquivo[sizeof($arquivo)-1] != 'jpeg'){
                    echo  'Essa imagem é ivalida..';
                    $success = false;
                }

                if($success == true){

                   if(empty($nome) || empty($email) || empty($tipo) || empty($imagem)){
                            echo "não é permitido enviar campos vazios";
                    }else{
                        // @unlink(BASE_DIR_PAINEL.'uploads/'.$imagem['name']);
                        move_uploaded_file($imagem['tmp_name'],BASE_DIR_PAINEL.'uploads/'.$imagem['name']);
                            $sql = \MySql::connect()->prepare("UPDATE `clientes` SET  nome = ?,email = ?,tipo = ?,cpf_cnpj = ?,imagem = ? WHERE id = $id ");
                            $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
                            $sql->execute(array($nome,$email,$tipo,$dadoFinal,$imagem['name']));
                            echo '<script>alert("atualizado com sucesso!!");location.href="edit_cliente?id='.$id.'"</script>';
                    }  

                }
                   
               }
               ?>
           </form> 
        </div><!--box__content-->

        <div class="box__content">
            <?php  
            if(isset($_POST['pagar'])){
                $cliente_id = $id;
                $nome = $_POST['pagamento_nome'];
                $valor = $_POST['valor'];
                $numero_parcelas = $_POST['parcelas'];
                $status = 0;
                $intervalo = $_POST['intervalo'];
                $vencimentoOriginal = $_POST['vencimento'];
                
                if(empty($nome) || empty($valor) || empty($numero_parcelas)){
                    echo '<div class="erro" >Campos vazios não são permitidos</div>';
                }else{
                    if(strtotime($vencimentoOriginal) < strtotime(date('Y-n-d'))){
                        echo '<div class="erro" >Você selecionou uma data negativa!</div>';
                    }else{
                       for($v = 0;$v < $numero_parcelas;$v++){
                        $vencimento = strtotime($vencimentoOriginal) + (($v * $intervalo)*60*60*24);
                        $sql = \MySql::connect()->prepare("INSERT `financeiro` VALUES (null,?,?,?,?,?)");
                        $sql->execute(array($nome,$cliente_id,$valor,date('Y-m-d',$vencimento),0));
                     }
                         echo '<div class="success" >O(s) pagamento(s) foi inserido com sucesso!</div>'; 
                    }
                }
                
            }
           
            ?>
           <h2>Adicionar pagamento!</h2>
           
           <form  method="post"  enctype="multipart/form-data">

           <div class="wrap__input">
                   <label for="">Nome do pagamento:</label>
                   <input type="text" name="pagamento_nome" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Valor do pagamento:</label>
                   <input formato="money" type="text" name="valor"  >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Numero de parcelas:</label>
                   <input formato="parcelas" type="text" name="parcelas" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Intervalo:</label>
                   <input formato="parcelas" type="text" name="intervalo" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Vencimento:</label>
                   <input class='datepicker' type="text" name="vencimento" >
               </div><!--wrap__input-->

                 <div class="wrap__input"> 
                   <input type="submit" name="pagar" value="Inserir Pagamento!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->

         <div class="box__content">
             <?php 
              if(isset($_GET['pago'])){
                $sql = \MySql::connect()->prepare("UPDATE `financeiro` SET  `status` = 1 WHERE id = ?");
                $sql->execute(array($_GET['pago']));
                echo '<div class="success" >o pagamento foi quitado com sucesso!</div>';
            }
             ?>
            <h2>Pagamentos Pendentes</h2>
            <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Nome do pagamento</td>
                       <td>Cliente</td>
                       <td>Valor</td>
                       <td>Vencimento</td>
                       <td>Mandar e-mail</td>
                       <td>Marca como pago</td>
                   </tr>
               </thead>
               <tbody>
                   <?php 
                   $sql = \MySql::connect()->prepare("SELECT * FROM `financeiro` WHERE status = 0 AND cliente_id = '$id' ORDER BY vencimento ASC");
                   $sql->execute();
                   $pendentes = $sql->fetchAll();
                   foreach($pendentes as $key => $value){
                       $clienteNome = \MySql::connect()->prepare("SELECT `nome` FROM `clientes` WHERE id = '$id' ");
                       $clienteNome->execute();
                       $clienteNome = $clienteNome->fetch()['nome'];
                       $style = '';
                       if(strtotime(date('Y-m-d')) >= strtotime($value['vencimento'])){
                            $style = 'style="background-color:#ff7070;font-weight:bold;"';
                       }
                   ?>
                    <tr <?php echo $style; ?> >
                       <td><?php echo $value['nome']; ?></td>
                       <td><?php echo $clienteNome; ?></td>
                       <td><?php echo $value['valor']; ?></td>
                       <td><?php echo date('d-m-Y',strtotime($value['vencimento'])); ?></td>
                       <td ><a href="" ><span class="btn blue"><i class="fa-solid fa-envelope"></i> E-mail<span></a></td>
                       <td ><a href="edit_cliente?pago=<?php echo $value['id']; ?>&id=<?php echo $id ?>" ><span class="btn orange" ><i class="fa-solid fa-check"></i> Pago</span></a></td>
                   
                   </tr>
                   <?php }?>
               </tbody>
                </table>
               
            </div><!--table__wrap-->

            <h2>Pagamentos Concluidos</h2>
            <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Nome do pagamento</td>
                       <td>Cliente</td>
                       <td>Valor</td>
                       <td>Vencimento</td>
                   </tr>
               </thead>
               <tbody>
                   <?php 
                   $sql = \MySql::connect()->prepare("SELECT * FROM `financeiro` WHERE status = 1 AND cliente_id = '$id' ORDER BY vencimento ASC LIMIT 10");
                   $sql->execute();
                   $pendentes = $sql->fetchAll();
                   foreach($pendentes as $key => $value){
                       $clienteNome = \MySql::connect()->prepare("SELECT `nome` FROM `clientes` WHERE id = '$id' ");
                       $clienteNome->execute();
                       $clienteNome = $clienteNome->fetch()['nome'];
                       $style = '';
                       if(strtotime(date('Y-m-d')) >= strtotime($value['vencimento'])){
                            $style = 'style="background-color:#ff7070;font-weight:bold;"';
                       }
                   ?>
                    <tr  >
                       <td><?php echo $value['nome']; ?></td>
                       <td><?php echo $clienteNome; ?></td>
                       <td><?php echo 'R$'.$value['valor']; ?></td>
                       <td><?php echo date('d-m-Y',strtotime($value['vencimento'])); ?></td>
                     
                   </tr>
                   <?php }?>
               </tbody>
                </table>
            </div><!--table__wrap-->

        </div><!--box__content-->

    </div><!--box__wrap-->

    
     
    
</section><!--painel__right-->