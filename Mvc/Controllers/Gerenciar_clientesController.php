<?php 
namespace Controllers;
class gerenciar_clientesController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('gerenciar_clientes');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_GET['excluirr'])){
                $idExcluir = intval($_GET['excluirr']);
                \Models\HomeModel::deletar('clientes',$idExcluir);
            }
            $this->view->render(array('titulo'=>'gerencie os seus clientes!'));
        }else{
            header('location: login');
        }
    }
}