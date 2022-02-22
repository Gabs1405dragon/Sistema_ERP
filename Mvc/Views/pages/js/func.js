$(()=>{
    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var targetSizeMenu = (windowSize <= 400) ? 200 : 300;

    if(windowSize <= 768){
        open = false;
    }

    $('.menu_btn').click(()=>{
        if(open){
            $('aside').animate({'width':'0'},function(){
                open = false;
            });
            $('section.painel__right').animate({'left':'0'},function(){
                open = false;
            });
            $('section.painel__right').css('width','100%');
        }else{
            $('aside').css('display','block');
            $('aside').animate({'width':targetSizeMenu+'px'},function(){
                open = true;
            });
            $('section.painel__right').animate({'left':targetSizeMenu+'px'},function(){
                open = true;
            });
            $('section.painel__right').css('width','calc(100% - 300px)');
        }
    })

    $(window).resize(function(){
        windowSize = $(window)[0].innerWidth;
        if(windowSize <= 768){
            $('aside').css('width','0');
            $('section.painel__right').css('width','100%').css('left','0');
            open = false;
        }else{
            open = true;
            $('aside').css('width','300px');
            $('section.painel__right').css('width','calc(100% - 300px)').css('left','300px');
        }
    })
    
    $('[formato=data]').mask('99/99/9999');
    $('[formato=cpf]').mask('000.000.000-00', {reverse: true});
    $('[formato=cnpj]').mask('00.000.000/0000-00', {reverse: true});

    $('[name=pessoa_cliente]').change(function(){
        var valor = $(this).val();
        if(valor == 'fisico' ){
            $('[name=cpf]').parent().show();
            $('[name=cnpj]').parent().hide();
        }else{
            $('[name=cpf]').parent().hide();
            $('[name=cnpj]').parent().show();
        }
    });
});