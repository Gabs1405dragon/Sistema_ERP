<?php  
include('MySql.php');

$pdo = new MySql();
?>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    section.pdf__section{
        margin: 0 auto;
        padding: 10px 2%;
        max-width: 900px;


    }
   
    .table__wrap table{
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }
    .table__wrap td{
        padding: 3px 10px;
        border: 1px solid black;
    }
    section.pdf__section h2{
        padding: 10px;
        background-color: brown;
        color: #ccc;

    }
</style>
<section class="pdf__section" >
<?php $nome = (isset($_GET['pagamento']) && $_GET['pagamento'] == 'concluidos') ? 'Concluidos' : 'Pendentes' ?>
<h2>Pagamentos <?php echo $nome ?></h2>

<div class="table__wrap">
    <table>
   <thead>
       <tr>
           <td style="font-weight: bold;" >Nome do pagamento</td>
           <td style="font-weight: bold;" >Cliente</td>
           <td style="font-weight: bold;" >Valor</td>
           <td style="font-weight: bold;" >Vencimento</td>
       
       </tr>
   </thead>
   <tbody>
       
       <?php 
       if($nome == 'Pendentes'){
        $nome = 0;
       }else{
           $nome = 1;
       }
       $sql = $pdo::connect()->prepare("SELECT * FROM `financeiro` WHERE status = '$nome'  ORDER BY vencimento ASC");
       $sql->execute();
       $pendentes = $sql->fetchAll();
       foreach($pendentes as $key => $value){
           $clienteNome = $pdo::connect()->prepare("SELECT `nome` FROM `clientes` WHERE id = '$value[cliente_id]'");
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

</section>
