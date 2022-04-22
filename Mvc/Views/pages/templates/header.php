<div class="box__painel__right">
        <header class="header" >
            <div class="menu_btn">
            <i class="fa-solid fa-bars"></i>
            </div>
            <div class="sair">
            <p <?php if($_GET['url'] == 'calendario'){ ?> style="background-color: #01579b;padding:10px 20px" <?php } ?> ><i class="fa-solid fa-calendar-days"></i> <a href="calendario">Calendário</a></p>
            <p <?php if($_GET['url'] == 'chat'){ ?> style="background-color: #01579b;padding:10px 20px" <?php } ?> ><i class="fa-solid fa-comment"></i> <a href="chat">Chat online</a></p>
            <p <?php if($_GET['url'] == 'home'){ ?> style="background-color: #01579b;padding:10px 20px" <?php } ?> ><i class="fa-solid fa-house"></i> <a  href="home">Pagina Inicial!</a> </p>
            <a href="home?excluir">Sair</a></div>
            <div class="clear"></div>
        </header>
    
</div>
<div class="clear"></div>
