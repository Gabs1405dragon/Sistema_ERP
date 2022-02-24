<?php 
namespace Controllers;
class DeleteController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('delete');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'..'));
        }else{
            header('location: login');
        }
    }
}