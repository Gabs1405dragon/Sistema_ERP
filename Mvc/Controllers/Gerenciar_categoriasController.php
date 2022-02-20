<?php  
namespace Controllers;

class Gerenciar_categoriasController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView("gerenciar_categorias");
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_GET['excluirr'])){
                $idExcluir = intval($_GET['excluirr']);
                \Models\HomeModel::deletar('categoria',$idExcluir);
            }
            $this->view->render(array('titulo'=>'lista das suas categorias!'));
        }else{
            header('location: login');
        }
    }
}