<?php  
 $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina']: 1;
 $porPagina = 7;

?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2>listas de todos os serviços!</h2>
           <div class="table__wrap">
                <table>
               <thead>
                   <tr>
                       <td>id</td>
                       <td>Serviços</td>
                       <td>Editar</td>
                       <td>Deletar</td>
                   </tr>
               </thead>
               <tbody>
                   <?php
                  $info =  \Models\HomeModel::selectAll('servicos',($paginaAtual - 1) * $porPagina,$porPagina);

                   foreach($info as $key => $value){?>
                   <tr>
                       <td><?php echo $value['id'];?></td>
                       <td><?php echo $value['servicos']; ?></td>
                       <td><a href="edit_servicos?id=<?php echo $value['id']; ?>" ><span class="edit"><i class="fa-solid fa-pen"></i><span></a></td>
                       <td><a href="listar_servicos?excluirr=<?php echo $value['id']; ?>" ><span class="trash" ><i class="fa-solid fa-trash-can"></i></span></a></td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
           </div><!--table__wrap-->

           <div class="paginacao">
               <?php  
               $totalPaginas = ceil(count(\Models\HomeModel::selectAll('servicos'))/$porPagina);
               for($i = 0;$i < $totalPaginas;$i++){
                   $numero  = $i + 1;
                   if($numero == $paginaAtual){
                    echo '<a class="active" href="listar_servicos?pagina='.$numero.'" >'.$numero.'</a>';
                   }else{
                       echo '<a href="listar_servicos?pagina='.$numero.'" >'.$numero.'</a>';
                   }
               ?>

               <?php } ?>
           </div><!--paginacao-->

        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->