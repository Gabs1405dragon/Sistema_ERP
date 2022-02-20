<?php  
 $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina']: 1;
 $porPagina = 5;

?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>listas de todos os depoimentos!</h2>
           <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>Categoria</td>
                       <td>Data</td>
                       <td>*</td>
                      
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $info =  \Models\HomeModel::selectAll('categoria',($paginaAtual - 1) * $porPagina,$porPagina);
                   
                   foreach($info as $key => $value){?>
                   <tr>
                      
                       <td><?php echo $value['nome']; ?></td>
                       <td><a href="edit_categoria?id=<?php echo $value['id']; ?>" >Editar</a></td>
                       <td><a href="gerenciar_categorias?excluirr=<?php echo $value['id']; ?>" >Deletar</a></td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
           </div><!--table__wrap-->

           <div class="paginacao">
               <?php  
               $totalPaginas = ceil(count(\Models\HomeModel::selectAll('categoria'))/$porPagina);
               for($i = 0;$i < $totalPaginas;$i++){
                   $numero  = $i + 1;
                   if($numero == $paginaAtual){
                    echo '<a class="active" href="gerenciar_categorias?pagina='.$numero.'" >'.$numero.'</a>';
                   }else{
                       echo '<a href="gerenciar_categorias?pagina='.$numero.'" >'.$numero.'</a>';
                   }
               ?>

               <?php } ?>
           </div><!--paginacao-->
          
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->