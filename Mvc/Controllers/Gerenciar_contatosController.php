<?php  
namespace Controllers;
class Gerenciar_contatosController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('gerenciar_contatos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(['titulo'=>'Gerenciar Contatos']);
        }else{
            echo '<script>location.href="login"</script>';
        }
    }
}