<aside class="painel__left" >
        <div class="padding">
        <div class="box__people"><img  src="<?php echo PATH_FULL ?>/uploads/<?php echo $_SESSION['imagem']; ?>"></div><!--box__people-->
            <div class="nome__usuario">     
                <h2><?php echo $_SESSION['nome']; ?></h2>
                <p> <?php echo $_SESSION['cargo']; ?></p>
            </div><!--nome__usuario-->
        </div><!--padding-->
            <div class="menu__items">
                <li class="item__principal" >Cadastro</li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar_depoimento') ?> ><a class="item__select" href="cadastrar_depoimento">Cadastrar Depoimento!</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar_servicos') ?> ><a class="item__select" href="cadastrar_servicos">Cadastrar Serviço!</a></li>
                <li class="item__principal" >Gestão</li>
                <li <?php echo \Models\HomeModel::selecionandoMenu('listar_depoimento') ?> ><a class="item__select" href="listar_depoimento">Listar Depoimentos!</a></li>
                <li <?php echo \Models\HomeModel::selecionandoMenu('listar_servicos') ?> ><a class="item__select" href="listar_servicos">Listar Serviços!</a></li>
                <li class="item__principal" >Administração do painel</li>
                <li <?php \Models\HomeModel::selecionandoMenu('editar_usuario'); ?> ><a class="item__select" href="editar_usuario?id=<?php echo $_SESSION['id'] ?>">Editar Usuário!</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('adicionar_usuarios'); ?> ><a class="item__select" href="adicionar_usuarios">Adicionar Usuário!</a></li>
                <li class="item__principal" >Configuração Geral</li>
                <li <?php \Models\HomeModel::selecionandoMenu('Editar_site'); ?> ><a class="item__select" href="Editar_site">Editar Site!</a></li>
                <li class="item__principal" >Gestão de noticias!</li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar_categorias'); ?> ><a class="item__select" href="cadastrar_categorias">Cadastrar categorias!</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('gerenciar_categorias'); ?> ><a class="item__select" href="gerenciar_categorias">Gerenciar categorias!</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar_noticias'); ?> ><a class="item__select" href="cadastrar_noticias">Cadastrar noticias!</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('gerenciar_noticias'); ?> ><a class="item__select" href="gerenciar_noticias">Gerenciar noticias!</a></li>
                <li class="item__principal" >Gestão de clientes</li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar_clientes'); ?> ><a class="item__select" href="cadastrar_clientes">Cadastrar clientes</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('gerenciar_clientes'); ?> ><a class="item__select" href="gerenciar_clientes">Gerenciar clientes</a></li>
                <li class="item__principal" >Controler finâceiro</li>
                <li <?php \Models\HomeModel::selecionandoMenu('visualizar_pagamento'); ?> ><a class="item__select" href="visualizar_pagamento">Visualizar pagamento</a></li>
                <li class="item__principal" >Controle Estoque</li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar-produtos'); ?> ><a class="item__select" href="cadastrar_produtos">Cadastrar produtos</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('visualizar_produtos') ?> ><a class="item__select" href="visualizar_produtos">Visualizar produtos</a></li>
                <li class="item__principal" >Gestão de imóveis</li>
                <li <?php \Models\HomeModel::selecionandoMenu('cadastrar_empreendimento') ?> ><a class="item__select" href="cadastrar_empreendimento">Cadastrar empreendimento</a></li>
                <li <?php \Models\HomeModel::selecionandoMenu('listar_empreendimento') ?> ><a class="item__select" href="listar_empreendimento">Listar empreendimentos</a></li>
                
            </div><!--menu__items-->

    </aside>