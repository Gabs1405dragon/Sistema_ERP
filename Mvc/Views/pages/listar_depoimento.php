<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>listas de todos os depoimentos!</h2>
           <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Nome</td>
                       <td>Data</td>
                       <td>*</td>
                       <td>*</td>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $dados = \MySql::connect()->prepare("SELECT * FROM `depoimentos`");
                   $dados->execute();
                   $depoimentos = $dados->fetchAll();
                   foreach($depoimentos as $key => $value){?>
                   <tr>
                       <td><?php echo $value['nome'];?></td>
                       <td><?php echo $value['date']; ?></td>
                       <td><a href="edit_depoimento?id=<?php echo $value['id']; ?>" >Editar</a></td>
                       <td><a href="listar_depoimento?excluirr=<?php echo $value['id']; ?>" >Deletar</a></td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
           </div><!--table__wrap-->
          
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->