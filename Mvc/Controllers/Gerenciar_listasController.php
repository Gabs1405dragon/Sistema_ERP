<?php  
namespace Controllers;
class Gerenciar_listasController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('gerenciar_listas');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(['titulo'=>'Gerenciar listas']);
        }else{
            echo '<script>location.href="login"</script>';
        }
    }
}