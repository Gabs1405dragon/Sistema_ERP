<?php  
namespace Controllers;
class Criar_campanhaController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('criar_campanha');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(['titulo'=>'Criar uma campanha']);
        }else{
            echo '<script>location.href="login"</script>';
        }
    }
}