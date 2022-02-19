<?php 
namespace Controllers;
class RegisterController{
    private $view;
    public function __construct()
    {
        $this->view = new \Views\MainView('register');
    }
    public function index(){
        if(isset($_SESSION['login'])){
            header('location: home');
        }else{
       
            
            if(isset($_POST['cadastrar'])){
             $nomeCadastro = $_POST['cadastro-nome'];
             $emailCadastro = $_POST['cadastro-email'];
             $senhaCadastro = $_POST['cadastro-senha'];
             $cargo = $_POST['cargos'];
             if(empty($nomeCadastro) && empty($emailCadastro) && empty($senhaCadastro)){
                echo '<div class="erro" >Por Favor preenchar todos os campos do cadastro!!</div>';
             }else{
                \Models\LoginModel::registrar($nomeCadastro,$emailCadastro,$senhaCadastro,$cargo);
             }
    
            }
            $this->view->render(array('titulo'=>'Registrar'));
        }
        
    }
}