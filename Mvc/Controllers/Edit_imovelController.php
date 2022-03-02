<?php 
namespace Controllers;
class Edit_imovelController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('edit_imovel');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'editar o imóvel'));
        }else{
            header('location: login');
        }
    }
}