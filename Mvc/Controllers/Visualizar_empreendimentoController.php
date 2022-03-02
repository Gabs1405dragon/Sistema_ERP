<?php 
namespace Controllers;
class visualizar_empreendimentoController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('visualizar_empreendimento');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_GET['id'])){
                $this->view->render(array('titulo'=>'Visualizar o empreendimento'));
            }else{
                header('location: listar_empreendimento');
            }
            
        }else{
            header('location: login');
        }
    }

}