<?php  
namespace Controllers;
class visualizar_pagamentoController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('visualizar_pagamento');
    }

    public function index(){
        $this->view->render(array('titulo'=>'Pagamentos!'));
    }
}