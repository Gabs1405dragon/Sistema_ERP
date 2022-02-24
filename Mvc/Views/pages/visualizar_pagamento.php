<section class="painel__right" >
    <div class="box__wrap">
<div class="box__content">
    <?php  
    if(isset($_GET['pago'])){
        $sql = \MySql::connect()->prepare("UPDATE `financeiro` SET `status` = 1 WHERE id = ? ");
        $sql->execute(array($_GET['pago']));
        echo '<div class="success" >o pagamento foi quitado com sucesso!</div>';
    };
    if(isset($_GET['email'])){
        $parcelas_id = (int)$_GET['parcela'];
        $cliente_id = (int)$_GET['email'];
        if(isset($_COOKIE['cliente_'.$cliente_id])){
            echo '<div class="erro" >Você já enviou um e-mail cobrando desse cliente! Aguerde mais um pouco.</div>';
        }else{
            $sql = \MySql::connect()->prepare("SELECT * FROM `financeiro` WHERE id = $parcelas_id");
            $sql->execute();
            $infoFinanceiro = $sql->fetch();
            $sql = \MySql::connect()->prepare("SELECT * FROM `clientes` WHERE id = $cliente_id");
            $sql->execute();
            $infoCliente = $sql->fetch();
           /* $corpoEmail = "Ola $infoCliente[nome] , voce esta com um saldo pendente de $infoFinanceiro[valor] com o vencimento para $infoFinanceiro[vencimento].
             Entre em contato conosco para quitar sua parcela!";*/
            echo '<div class="success" >E-mail enviado com sucesso!</div>';
            setcookie('cliente_'.$cliente_id,'true',time()+30,'/');
        }
    }
    ?>
            <h2>Pagamentos do Pendentes</h2>
            <div class="gera_pdf"  >
                <a href="gerar_pdf.php?pagamento=pendentes" target="_blank">Gerar pdf</a>
            </div>
            <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Nome do pagamento</td>
                       <td>Cliente</td>
                       <td>Valor</td>
                       <td>Vencimento</td>
                       <td>Mandar e-mail</td>
                       <td>Mandar como pago</td>
                   </tr>
               </thead>
               <tbody>
                   <?php 
                   $sql = \MySql::connect()->prepare("SELECT * FROM `financeiro` WHERE status = 0  ORDER BY vencimento ASC");
                   $sql->execute();
                   $pendentes = $sql->fetchAll();
                   foreach($pendentes as $key => $value){
                       $clienteNome = \MySql::connect()->prepare("SELECT `nome` FROM `clientes` WHERE id = $value[cliente_id] ");
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
                       <td ><a href="visualizar_pagamento?email=<?php echo $value['id']; ?>&parcela=<?php echo $value['id']; ?>" ><span class="btn blue"><i class="fa-solid fa-envelope"></i> E-mail<span></a></td>
                       <td ><a href="visualizar_pagamento?pago=<?php echo $value['id']; ?>" ><span class="btn orange" ><i class="fa-solid fa-check"></i> Pago</span></a></td>
                   
                   </tr>
                   <?php }?>
               </tbody>
                </table>
            </div><!---table__wrap-->

            <h2>Pagamentos Concluidos</h2>
            <div class="gera_pdf"  >
                <a href="gerar_pdf.php?pagamento=concluidos" target="_blank">Gerar pdf</a>
            </div>
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
                   $sql = \MySql::connect()->prepare("SELECT * FROM `financeiro` WHERE status = 1  ORDER BY vencimento ASC");
                   $sql->execute();
                   $pendentes = $sql->fetchAll();
                   foreach($pendentes as $key => $value){
                       $clienteNome = \MySql::connect()->prepare("SELECT `nome` FROM `clientes` WHERE id = $value[cliente_id] ");
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
                       <td><?php echo $value['valor']; ?></td>
                       <td><?php echo date('d-m-Y',strtotime($value['vencimento'])); ?></td>
                   
                   </tr>
                   <?php }?>
               </tbody>
                </table>

            </div><!---table__wrap-->
            
        </div><!--box__content-->

    </div><!--box__wrap-->
</section>