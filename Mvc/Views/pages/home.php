<?php  
$usuariosOnline = \Models\HomeModel::listarUsuariosOnline();

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
                        <p><?php echo count($usuariosOnline); ?></p>
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
                            <?php foreach($usuariosOnline as $key => $value){ ?>
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
                <h2><i class="fa-solid fa-chart-column"></i> Grafico</h2>
                   <style>
                       .grafico{
                           max-width: 400px;
                           
                       }
                   </style>             
                <div class="grafico">
                    <canvas id="myChart" width="600" height="300"></canvas>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                  const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janeiro', 'Fevereiro','março', 'Abril', 'Maio', 'Junho', 'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        datasets: [{
            label: '# Receitas dos messes',
            data: [12, 19,22, 3, 5, 2, 3,4,6,2,8,14,10],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 222, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 98, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 203, 86, 0.2)',
                'rgba(75, 190, 192, 0.2)',
                'rgba(153, 111, 255, 0.2)',
                'rgba(255, 155, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 222, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 98, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 203, 86, 1)',
                'rgba(75, 190, 192, 1)',
                'rgba(153, 111, 255, 1)',
                'rgba(255, 155, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});  
                </script>
            </div>  

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
  
