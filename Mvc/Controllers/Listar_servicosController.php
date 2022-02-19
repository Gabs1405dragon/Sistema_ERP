<?php 
namespace Controllers;
class Listar_servicosController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('listar_servicos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'todos os serviços!'));
        }else{
            header('location: login');
        }
    }
}