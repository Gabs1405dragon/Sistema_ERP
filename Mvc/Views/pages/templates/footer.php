    
    <script src="<?php echo PATH_FULL ?>/Javascripts/all.min.js" ></script>
    <script src="<?php echo PATH_FULL ?>/Javascripts/all.js" ></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="<?php echo PATH_FULL ?>/Javascripts/jquery.ajaxForm.js" ></script>
    <script src="<?php echo PATH_FULL ?>/Javascripts/jquery.maskMoney.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
    <script src="<?php echo PATH_FULL?>/Javascripts/Func.js" ></script>
    <script src="<?php echo PATH_FULL?>/Javascripts/chat.js" ></script>
    <script src="<?php echo PATH_FULL ?>/Javascripts/jquery.mask.js" ></script>
    <script src="<?php echo PATH_FULL ?>/Javascripts/ajax.js" ></script>
    <script src="<?php echo PATH_FULL ?>/Javascripts/jquery-ui.min.js" ></script>
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
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({
        plugins: 'image',
        selector:'.tinymce',
        height: '500'
        });</script>
</body>
</html>