<?php  
namespace Controllers;

class Gerenciar_noticiasController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('gerenciar_noticias');
    }

    public function index(){
        if($_SESSION['login']){
            if(isset($_GET['excluirr'])){
                $idExcluir = intval($_GET['excluirr']);
                \Models\HomeModel::deletar('noticias',$idExcluir);
            }
            $this->view->render(array('titulo'=>'listas das noticias'));
        }else{
            header('location: login');
        }
    }
}