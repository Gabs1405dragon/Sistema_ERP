<?php 
namespace Controllers;
class Edit_produtoController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('edit_produto');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'Editar os produtos'));
        }else{
            header('location: login');
        }
    }
}