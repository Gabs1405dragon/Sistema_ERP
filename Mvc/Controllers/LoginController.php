<?php  
namespace Controllers;
class LoginController{
    private $view;

    public function __construct()
    {
        $this->view = new \Views\MainView('login');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            header('location: home');
        }else{
            if(isset($_POST['acao'])){
                $email = $_POST['login'];
                $senha = $_POST['senha'];
                if(empty($email) || empty($senha)){
                    echo "<div class='erro'>Por Favor Preenchar todos os Campos!</div>";
                }else{
                    \Models\LoginModel::logar($email,$senha);
                    
                }
            }
           $this->view->render(array('titulo'=>'login')); 
        }
        
    }

}