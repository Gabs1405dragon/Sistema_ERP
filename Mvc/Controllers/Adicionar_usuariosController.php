<?php  
namespace Controllers;
class adicionar_usuariosController{
    private $view;

    public function __construct()
    {
        $this->view = new \Views\MainView('adicionar_usuarios');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['create'])){
                $nome = $_POST['nome'];
                $email = $_POST['user'];
                $senha = $_POST['new_password'];
                $cargo = $_POST['cargos'];
                if(empty($nome) && empty($email) && empty($senha) && empty($cargo)){
                    echo '<div class="erro" >Preenchar todos os campos!!</div>';
                }else{
                    \Models\HomeModel::cadastrarUsuario($nome,$email,$senha,$cargo);
                    header('location: adicionar_usuarios');
                }
            }
        $this->view->render(array('titulo'=>'Adicione um usuario novo!'));
        }else{
            header('location: login');
        }
        
    }
}