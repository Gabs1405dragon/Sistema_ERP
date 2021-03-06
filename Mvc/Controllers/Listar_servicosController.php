<?php 
namespace Controllers;
class Listar_servicosController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('listar_servicos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_GET['excluirr'])){
                $idExcluir = intval($_GET['excluirr']);
                \Models\HomeModel::deletar('servicos',$idExcluir);
            }
            $this->view->render(array('titulo'=>'todos os serviços!'));
        }else{
            header('location: login');
        }
    }
}