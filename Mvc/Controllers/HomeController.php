<?php  
namespace Controllers;

class HomeController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('home');
    }
    public function index(){

         if(!isset($_SESSION['login'])){
            header('location: login');
            
        }else{
            if(isset($_GET['excluirr'])){
                $idExcluir = intval($_GET['excluirr']);
                setcookie('Painel',true,time()-24*24*7,'/');
                \Models\HomeModel::deletar('usuarios',$idExcluir);
            }
                   $this->view->render(array('titulo'=>'Home do Sistema!'));
            
        }
    }
}