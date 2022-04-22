$(function(){
    $('.ajax').ajaxForm({
        dataType: 'json'
        ,
        beforeSend:function(){
            $('.ajax').animate({'opacity':'0.6'});
            $('.ajax').find('input[type=submit]').attr('disabled','true');
        }
        ,
        success: function(data){
            $('.ajax').animate({'opacity':'1'});
            $('.ajax').find('input[type=submit]').removeAttr('disabled');
            $('.erro').remove();
            $('.success').remove();
            if(data.success){
                $('.ajax').prepend('<div class="success" >o cliente foi inserido com sucesso!</div>');
                $('.ajax')[0].reset();
            }else{
                $('.ajax').prepend('<div class="erro" >Ocorreram os seguintes erros:<b>'+ data.mensagem +'</b></div>');
            }
            console.log(data);
        }
    })
    
})