<?php 
namespace Controllers;
class Listar_depoimentoController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('listar_depoimento');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_GET['excluirr'])){
                $idExcluir = intval($_GET['excluirr']);
                \Models\HomeModel::deletar('depoimentos',$idExcluir);
            }
            $this->view->render(array('titulo'=>'listas de todos os depoimentos!'));
        }else{
            header('location: login');
        }
    }
}