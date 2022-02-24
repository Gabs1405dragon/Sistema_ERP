<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2><i class="fa-solid fa-people-carry-box"></i> Gerenciar clientes!</h2>
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
           if(isset($_POST['acao'])){
            $busca = $_POST['busca'];
            $query = " WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%' OR cpf_cnpj LIKE '%$busca%'";
           }
           $clientes = \MySql::connect()->prepare("SELECT * FROM `clientes` $query");
           $clientes->execute();
           $clientes = $clientes->fetchAll();
           if(isset($_POST['acao'])){
                echo '<div classs="search" ><p>Foram encontrados <b>'.count($clientes).'</b> resultado(s)!</p></div>';
           }
      
           foreach($clientes as $value){ ?>
           <div class="cliente__wraper">
                <div class="cliente__box">
                    <div class="head__cliente">
                        <div <?php if(!$value['imagem']== ''){  ?> style="padding:0"<?php } ?> class="circle__cliente">
                            <?php if($value['imagem'] == ''){ ?>
                            <span><i class="fa-solid fa-circle-user"></i></span>
                            <?php }else{ ?>
                            <img  src="<?php echo PATH_FULL ?>/uploads/<?php echo $value['imagem']?>" alt="">
                                <?php }?>   
                        </div><!--cirle-->
                    </div><!--head__cliente-->
                    <div class="body__cliente">
                        <h4><i class="fa-solid fa-file-signature"></i> Nome do cliente:</h4><p> <?php echo ucfirst($value['nome'])  ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-envelope"></i> E-mail:</h4><p> <?php echo $value['email']; ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-person-walking"></i> Tipo:</h4><p> <?php echo $value['tipo']; ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-file-signature"></i> <?php if($value['tipo'] == 'fisico'){echo 'CPF: ';}else{echo 'CNPJ: ';}?></h4><p> <?php echo $value['cpf_cnpj']; ?></p>
                        <div class=""></div>
                        <a class="box__crud green" href="edit_cliente?id=<?php echo $value['id']; ?>">Editar</a>
                        <a class="box__crud orange " href="delete?id=<?php echo $value['id']; ?>">Excluir</a>
                    </div><!--body__cliente-->
                </div><!--cliente__box-->
           </div><!--cliente__wraper-->
           <?php }; ?>
          <div class="clear"></div>
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->