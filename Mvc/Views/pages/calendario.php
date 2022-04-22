<?php
// $mes = (isset($_GET['mes']) ? $_GET['mes'] : date('m',time()));
// $ano = (isset($_GET['ano']) ? $_GET['ano'] : date('Y',time()));
$mes = date('m',time());
$ano = date('Y',time());

if($mes > 12){
 $mes = 12;
}else if($mes < 1){
    $mes = 1;
}

$numeroDias = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);
$diaInicialdoMes = date('N',strtotime("$ano-$mes-01"));
$diaDeHoje = date('d',time());
$diaDeHoje = "$ano-$mes-$diaDeHoje";
$meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
$nomeMes = $meses[(int)$mes-1];
?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2><i class="fa-solid fa-calendar-days"></i> Calendário e Agenda! | <u><?php echo $nomeMes ?></u> / <?php echo $ano; ?></h2>
           <div class="table__wrap">
                <table class="calendario">
               <thead>
                   <tr>
                       <td>Domingo</td>
                       <td>Segunda</td>
                       <td>Terça</td>
                       <td>Quarta</td>
                       <td>Quinta</td>
                       <td>Sexta</td>
                       <td>Sábado</td>
                   </tr>
               </thead>
               <tbody>
                  <tr>
                <?php   
                   $n = 1;
                   $z = 0;
                   $numeroDias+=$diaInicialdoMes;
                   while($n <= $numeroDias){
                    if($diaInicialdoMes == 7 && $z != $diaInicialdoMes){
                        $z = 7;
                        $n = 8;
                    }
                    if($n % 7 == 1){
                        echo '<tr>';
                    }

                    if($z >= $diaInicialdoMes){
                        $dia = $n - $diaInicialdoMes;
                        if($dia < 10){
                            $dia = str_pad($dia,strlen($dia)+1,"0",STR_PAD_LEFT);
                        }
                        $atual = "$ano-$mes-$dia";
                        if($atual != $diaDeHoje){
                            echo "<td dia=\"$atual\" >$dia</td>";
                        }else{
                            echo '<td dia="'.$atual.'" class="calendario_active">'.$dia.'</td>';
                        }
                    }else{
                        echo '<td></td>';
                        $z++;
                    }
                    if($n % 7 == 0){
                        echo '</td>';
                    }
                   $n++;
                }
                   ?>
                
                   
                </tr>
               </tbody>
           </table>
        
           </div><!--table__wrap-->
           <?php  
           if(isset($_POST['adicionar_tarefa'])){
               $tarefa = $_POST['tarefa'];
               $data = $_POST['data'];
               if(empty($tarefa) || empty($data)){
                    echo 'preenchar os campos';
               }else{
                    $sql = \MySql::connect()->prepare("INSERT INTO agenda VALUES (null,?,?)");
                    $sql->execute(array($tarefa,$data));
                    ob_start();
                    header('location: calendario');
                    ob_get_clean();
               }
           }
           ?>
           <form method="post" >
               <h3 class="card" >Adicionar tarefas</h3>
               <div class="wrap__input">
                   <input type="text" name="tarefa" placeholder="O que fazer??" >
               </div>
               <div class="wrap__input">
                   <input formato="data" type="text" name="data" placeholder="00/00/0000"  >
               </div>
               <div class="wrap__input">
                   <input type="submit" name="adicionar_tarefa" value="Cadastrar" >
               </div>
           </form>

           <div class="card__title d"><h2> Tarefas </h2></div>
           <?php
           $agenda = \MySql::connect()->prepare("SELECT * FROM agenda");
           $agenda->execute();
           $agendas = $agenda->fetchAll();

           foreach($agendas as $agenda){ ?>
             <div class="tarefa__single">
                 <div class="tarefa">
                     <p><i class="fa-solid fa-pen"></i>  <?php echo $agenda['tarefa']; ?></p>
                     <p><i class="fa-solid fa-calendar-days"></i> <?php echo $agenda['data'] ?></p>
                 </div>
             </div>
             <?php }?>
             <div class="clear"></div>
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->