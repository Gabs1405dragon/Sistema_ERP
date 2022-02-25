<?php  
namespace Controllers;
class visualizar_produtosController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('visualizar_produtos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'visualizar todos os produtos!'));
        }else{
            header('location: login');
        }
    }
}