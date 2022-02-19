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
                   $this->view->render(array('titulo'=>'Home do Sistema!'));
            
        }
    }
}