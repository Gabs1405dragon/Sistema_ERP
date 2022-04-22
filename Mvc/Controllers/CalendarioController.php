<?php 
namespace Controllers;
class CalendarioController{
    private $view;
    public function __construct()
    {
        $this->view = new \Views\MainView('calendario');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(['titulo'=>'Calendário']);
        }else{
            ob_start();
            header('location: login');
            ob_end_flush();
        }
    }
}