<?php  
$listarUsuarios = \Models\HomeModel::listarUsuariosOnline();

$pegarVisitasTotais = \MySql::connect()->prepare("SELECT * FROM `visitas` ");
$pegarVisitasTotais->execute();

$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

$pegarVisitasHoje = \MySql::connect()->prepare("SELECT * FROM `visitas` WHERE dia = ?");
$pegarVisitasHoje->execute(array(date('Y-m-d')));
$pegarVisitasHoje = $pegarVisitasHoje->rowCount();

?>
    
    <section class="painel__right" >
        
        <div class="box__wrap">
            <div class="box__content">
                <h2><i class="fa-solid fa-house"></i> Painel de controler!</h2>

                <div class="box__wrap w33">
                    <div class="box__online orange">
                        <h3>Usuários Online</h3>
                        <p><?php echo count($listarUsuarios); ?></p>
                    </div><!--box__online-->
                </div><!--box__wrap-->

                <div class="box__wrap w33">
                    <div class="box__online blue">
                        <h3>Total de visitas</h3>
                        <p><?php echo $pegarVisitasTotais; ?></p>
                    </div><!--box__online-->
                </div><!--box__wrap-->

                <div class="box__wrap w33">
                    <div class="box__online green">
                        <h3>Visitas hoje</h3>
                        <p><?php echo $pegarVisitasHoje ?></p>
                    </div><!--box__online-->
                </div><!--box__wrap-->
                <div class="clear"></div>

            </div><!--box__content-->

           
            <div class="box__content">
                <h2><i class="fa-solid fa-computer-mouse"></i> Usuários online!</h2>

                <div class="wrap__table2">
                    <table>
                        <thead>
                            <tr>
                                <td>IP</td>
                                 <td>Ultima hora</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listarUsuarios as $key => $value){ ?>
                            <tr>
                                <td><?php echo $value['ip']; ?></td>
                                <td><?php echo date('d/m/Y H:i:s',strtotime($value['ultimo_acao'])); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!--wrap__table-->

            </div><!--box__content-->

            <div class="box__content">
                <h2><i class="fa-solid fa-users"></i> Todos os usuários do painel!</h2>

                <div class="wrap__table2">
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                 <td>Cargo</td>
                                 <td>Deletar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $usuarios = \MySql::connect()->prepare("SELECT * FROM `usuarios`");
                            $usuarios->execute();
                            $usuarios = $usuarios->fetchAll();
                            foreach($usuarios as $key => $value){
                            ?>
                            <tr>
                                <td><?php echo $value['nome']; ?></td>
                                <td><?php echo $value['cargo']; ?></td>
                                <td><a href="home?excluirr=<?php echo $value['id']; ?>" ><span class="trash" ><i class="fa-solid fa-trash-can"></i></span></a></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div><!--wrap__table-->

            </div><!--box__content-->

        </div><!--box__wrap--> 

    </section><!--painel__right-->
  
