<?php  
namespace Controllers;
class Editar_siteController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('Editar_site');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'Pagina para editar o site'));
        }
    }
}