<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2><i class="fa-solid fa-people-carry-box"></i> Gerenciar clientes!</h2>
           <?php 
           $clientes = \MySql::connect()->prepare("SELECT * FROM `clientes`");
           $clientes->execute();
           $clientes = $clientes->fetchAll();
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
                        <h4><i class="fa-solid fa-file-signature"></i> Nome do cliente:</h4><p> <?php echo $value['nome'] ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-envelope"></i> E-mail:</h4><p> <?php echo $value['email']; ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-person-walking"></i> Tipo:</h4><p> <?php echo $value['tipo']; ?></p>
                        <div class=""></div>
                        <h4><i class="fa-solid fa-file-signature"></i> <?php if($value['tipo'] == 'fisico'){echo 'CPF:';}else{echo 'CNPJ:';}?></h4><p> <?php echo $value['cpf_cnpj']; ?></p>
                        <div class=""></div>
                        <a class="box__crud green" href="edit_cliente?id=<?php echo $value['id']; ?>">Editar</a>
                        <a class="box__crud orange " href="gerenciar_clientes?excluirr=<?php echo $value['id']; ?>">Excluir</a>
                    </div><!--body__cliente-->
                </div><!--cliente__box-->
           </div><!--cliente__wraper-->
           <?php }; ?>
          <div class="clear"></div>
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->