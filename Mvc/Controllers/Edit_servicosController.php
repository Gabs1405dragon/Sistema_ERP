<?php  
namespace Controllers;
class Edit_servicosController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('edit_servicos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['edit_alterar'])){
                $servico = $_POST['edit_servico'];
                if(empty($servico)){
                    echo '<div class="erro" >Não deixe o campo de serviço vázio</div>';
                }else{
                    \Models\HomeModel::updateServicos($servico);
                    header('location: edit_servicos');
                }
            }
            $this->view->render(array('titulo'=>'Mudar o serviço!'));
        }else{
            header('location: login');
        }
    }
}