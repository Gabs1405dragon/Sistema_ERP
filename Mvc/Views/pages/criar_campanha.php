<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
            <?php  
            if(isset($_POST['criar_campanha'])){
                $assunto = $_POST['assunto'];
                $descricao = $_POST['descricao'];
                $contato = \MySql::connect()->prepare("SELECT * FROM contatos WHERE lista_id = ?");
                $contato->execute(array($_POST['lista_id']));
                $contatos = $contato->fetchAll();
                if(empty($assunto) || empty($descricao)){
                    echo '<div class="erro" >Preenchar todos os campos!</div>';
                }else{
                   
                  foreach($contatos as $values){
                    $mail = new \Email('smtp.gmail.com','souzagabriel1405.henrique@gmail.com','SONW.8634','Gabs1405');
                    $mail->formatarEmail(array('assunto'=>$assunto,'corpo'=>$descricao));
                    $email_atual = $values['email'];
                    $mail->addAdress($email_atual,'');
                    $mail->enviarEmail();
                    sleep(1);
                  }
                    
                 
                }
            }
            ?>
           <h2>Adicionar novo contato</h2>
           <form method="post">
             

               <div class="wrap__input">
                   <label for="">Listas do contato:</label>
                   <select name="lista_id" id="">
                       <?php  
                       $lista = \MySql::connect()->prepare("SELECT * FROM listas_email");
                       $lista->execute();
                       $listas = $lista->fetchAll();
                       foreach($listas as $value){
                        echo '<option value="'.$value['id'].'">'.$value['nome_lista'].'</option>';
                       }
                       ?>
                   </select>
               </div><!--wrap__input-->
              
               <div class="wrap__input">
                   <label for="">Assunto</label>
                   <input type="text" name="assunto" >
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <label for="">Descrição</label>
                   <textarea name="descricao"></textarea>
               </div><!--wrap__input-->

               <div class="wrap__input">
                   <input type="submit" name="criar_campanha" value="Criar" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->

        
    </div><!--box__wrap-->
    
</section><!--painel__right-->