<?php  
namespace Controllers;

class Edit_depoimentoController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('edit_depoimento');
    }

    public function index(){
        if(isset($_SESSION['login'])){
           

            if(isset($_POST['mandar'])){
                $nome = $_POST['nome_pessoa'];
                $depoimento = $_POST['depoimento'];
                $date = $_POST['date'];
                if(empty($nome) && empty($depoimento) && empty($date)){
                    echo '<div class="erro">preencha todos os campos!<div>';
                }else{
                    \Models\HomeModel::updateDepoimento($nome,$depoimento,$date);
                    echo '<div class="success">Editado com sucesso!!</div>';
                }
            }
            $this->view->render(array('titulo'=>'editar o depoimento!'));
        }else{
            header('location: login');
        }
    }
}