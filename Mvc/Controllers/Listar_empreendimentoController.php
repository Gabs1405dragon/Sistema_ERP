<?php 
namespace Controllers;

class listar_empreendimentoController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('listar_empreendimento');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'listar todos os empreendimentos!'));
        }else{
            header('location: login');
        }
    }
}