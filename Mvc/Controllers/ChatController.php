<?php  
namespace Controllers;
class ChatController{
    private $view;

    public function __construct()
    {
        $this->view = new \Views\MainView('chat');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            
        $this->view->render(array('titulo'=>'o chat do site!'));
        }else{
            header('location: login');
        }
        
    }
}