    
    <script src="<?php echo PATH_FULL ?>/js2/all.min.js" ></script>
    <script src="<?php echo PATH_FULL ?>/JAvascripts/all.js" ></script>
    
    <script src="<?= PATH_FULL?>/js2/jquery.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js2/jquery.ajaxForm.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js2/jquery.maskMoney.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
    
    <script src="<?php echo PATH_FULL?>/js2/Func.js" ></script>
    
    <script src="<?php echo PATH_FULL ?>/js2/jquery.mask.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js2/ajax.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js2/jquery-ui.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    $(()=>{
    /*$('.calendario td').click(()=>{
     $('.calendario td').removeClass('calendario_active');
     $(this).addClass('calendario_active');
     var novoDia = $(this).attr('dia').split('-');
     var novoDia = novoDia[2]+'/'+novoDia[1]+'/'+novoDia[0];
     trocarDatas($(this).attr('dia'),novoDia);
   });

   function trocarDatas(nformatado,formatado){
     $('input[type=hidden]').attr('value',nformatado);
     $('form .card').html('Adicionar Tarefa para: '+formatado);
     $('.d').html('Adicionar Tarefa para: '+formatado);
   };*/
   $('.mesagem').scrollTop($(".mesagem").prop("scrollHeight")); 
   $('textarea.textarea').keyup(function(e){
    var code = e.keyCode || e.which;
    if(code == 13){
       chat();
    }
  
});
$('form.form').submit(function(){
    insertChat();
    return false;
});
  function insertChat(){
        var mensagem = $('textarea.textarea').val();
        $('textarea.textarea').val('');
        var base = 'http://localhost/teste/git/Mvc/Views/pages/';

        $.ajax({
            url: 'http://localhost/teste/git/Mvc/Views/pages/ajax/chat.php',
            method:'post',
            data:{'mensagem':mensagem,'acao':'inserir_mensagem'}
        }).done(function(data){
            $('.mesagem').append(data);
            $('.mesagem').scrollTop($(".mesagem").prop("scrollHeight"));  
        })
    }

  function recuperarMensagens(){
    $.ajax({
            url: 'http://localhost/teste/git/Mvc/Views/pages/ajax/chat.php',
            method:'post',
            data:{'acao':'pegarMensagens'}
        }).done(function(data){
            $('.mesagem').append(data);
            $('.mesagem').scrollTop($(".mesagem").prop("scrollHeight")); 
        })
  }  

  setInterval(()=>{
    recuperarMensagens();
  },1000);

$('[formato=data]').mask('99/99/9999');
            $( ".cliente__wraper" ).sortable({
                start:function(){
                    let el = $(this);
                    if(!el == true){
                         el.find('.cliente__box').css('border','5px dashed black');
                    }else{
                        el.find('.cliente__box').css('border','3px solid black');
                    }
                   
            },
            update:function(event,ui){
               // var data = $(this).sortable('serialize');
               // console.log(date);
                let el = $(this);
                el.find('.cliente__box').css('border','1px solid black');
            }
        });
        });
        $('.notificacao').hover(function(){ 
            $('.box__notificacao').fadeIn();
  
        });
        $('.do').hover(function(){ 
            $('.box__notificacao').fadeOut();
  
        });
        $('[type=text],[type=email],[type=password],[type=file],textarea').click(function(){
        $('.erro').css('display','none');
        $('.success').css('display','none');
})
        $('table.calendario tbody td').click(function(){
            $('table.calendario tbody td').removeClass('calendario_active');
            $(this).addClass('calendario_active');
        
          })
    
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({
        plugins: 'image',
        selector:'.tinymce',
        height: '500'
        });
        
        </script>
</body>
</html>