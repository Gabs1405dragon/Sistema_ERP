
<section class="painel__right">
    <div class="box__wrap">
        <div class="box__content">
           <h2><i class="fa-solid fa-comment"></i> Chat Online !</h2>
           <div class="mesagem">
               <?php 
               
               $chat = \MySql::connect()->prepare("SELECT * FROM chat ORDER BY id DESC LIMIT 10");
               $chat->execute();
               $chat = $chat->fetchAll();
               $chat = array_reverse($chat);

               foreach($chat as $value){ 
                   $lastId = $value['id'];
                   ?>
               <div class="chat">
                   <h3><?php echo $value['nome']; ?></h3>
                   <p><?php echo $value['mensagem']; ?></p>
               </div>
               <?php
                $_SESSION['lastIdChat'] = $lastId ; 
            } ?>
           </div>
           <form class="form" method="post" >
               
               <div class="wrap__input">
                   <textarea class="textarea" name="mensagem" ><?php \Models\HomeModel::pegarPost('mensagem') ?></textarea>
               </div><!--wrap__input-->
               
               <div class="wrap__input">
                  
                   <input type="submit" name="acao" value="Comentar" >
               </div><!--wrap__input-->
           </form> 
        </div><!--box__content-->
    </div><!--box__wrap-->
    
</section><!--painel__right-->

<script src="<?= PATH_FULL?>/js2/Chat.js" ></script>