<?php 
namespace Controllers;
class Cadastrar_servicosController{
    private $view ;
    public function __construct()
    {
        $this->view = new \Views\MainView('cadastrar_servicos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['mandar_servico'])){
                $servico = $_POST['servico'];
                if(empty($servico)){
                    echo '<div class="erro" >Não é pemitido Campos Vázios!</div>';
                }else{
                    \Models\HomeModel::insertServico($servico);
                    header('location: cadastrar_servicos');
                }
            }
            $this->view->render(array('titulo'=>'Cadastre os seus serviços nessa sessão!'));
        }else{
            header('location: login');
        }
       
    }
}