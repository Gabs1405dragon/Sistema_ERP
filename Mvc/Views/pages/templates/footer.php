    
    <script src="<?php echo PATH_FULL ?>/js/all.min.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js/all.js" ></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js/jquery.ajaxForm.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js/jquery.maskMoney.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
    <script src="<?php echo PATH_FULL?>/js/func.js" ></script>
    
    <script src="<?php echo PATH_FULL ?>/js/jquery.mask.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js/ajax.js" ></script>
    <script src="<?php echo PATH_FULL ?>/js/jquery-ui.min.js" ></script>
    <script>
        $(()=>{
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