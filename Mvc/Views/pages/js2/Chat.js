$(()=>{

  $('.mesagem').scrollTop($(".mesagem").prop("scrollHeight")); 
  
  
  $('textarea').keyup(function(e){
    var code = e.keyCode || e.which;
    if(code == 13){
       chat();
    }
  
});
$('form').submit(function(){
    insertChat();
    return false;
});
  function insertChat(){
        var mensagem = $('textarea').val();
        $('textarea').val('');
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


});
