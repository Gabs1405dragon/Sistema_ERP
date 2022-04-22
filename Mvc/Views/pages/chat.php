<?php
 echo '<script>
 setInterval(()=>{
    location.href="chat";
    },10000);
 </script>'; ?>
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2><i class="fa-solid fa-comment"></i> Chat Online !</h2>
           <div class="mesagem">
               <?php 
               if(isset($_POST['mandar_mensagem'])){
                $mensagem = $_POST['mensagem'];
                $user_id = $_SESSION['user_id'];
                if(empty($mensagem)){
                    echo 'Coloque uma mensagem!!!';
                }else{
                    $sql = \MySql::connect()->prepare("INSERT INTO chat VALUES (null,?,?)");
                    $sql->execute(array($user_id,$mensagem));
                    //header('location: chat');
                    $_SESSION['lasdIdChat'] = \MySql::connect()->lastInsertId();
                    echo '<script>location.href="chat"</script>';
                }
               }

               $chat = \MySql::connect()->prepare("SELECT * FROM chat ORDER BY id DESC LIMIT 10");
               $chat->execute();
               $chat = $chat->fetchAll();
               $chat = array_reverse($chat);

               foreach($chat as $value){ 
                   $user = \MySql::connect()->prepare("SELECT nome FROM usuarios WHERE id = ?");
                   $user->execute(array($value['user_id']));
                   $user = $user->fetch()['nome'];
                   $lastId = $value['id'];
                   ?>
               <div class="chat">
                   <h3><?php echo $user; ?></h3>
                   <p><?php echo $value['mensagem']; ?></p>
               </div>
               <?php $_SESSION['lastIdChat'] = $lastId ; } ?>
           </div>
           <form method="post" >
               
               <div class="wrap__input">
                   <textarea name="mensagem" ><?php \Models\HomeModel::pegarPost('mensagem') ?></textarea>
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                  
                   <input type="submit" name="mandar_mensagem" value="Enviar!" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->