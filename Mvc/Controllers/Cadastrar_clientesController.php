<?php  
namespace Controllers;
class Cadastrar_clientesController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('cadastrar_clientes');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'cadastrar os clientes '));
        }else{
            header('location: login');
        }
    }
}