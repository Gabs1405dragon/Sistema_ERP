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
             $confSenha = $_POST['confSenha'];
             $imagem = $_FILES['imagem'];
             $cargo = $_POST['cargos'];
             if(empty($nomeCadastro) || empty($emailCadastro) || empty($senhaCadastro)){
                echo '<div class="erro" >Por Favor preenchar todos os campos do cadastro!!</div>';
             }else{
                 if(filter_var($emailCadastro,FILTER_VALIDATE_EMAIL)){
                     if(strlen($senhaCadastro) >= 7){
                         if($confSenha == $senhaCadastro){
                            $senhaCadastro = \Bcrypt::hash($senhaCadastro);
                            \Models\LoginModel::registrar($nomeCadastro,$emailCadastro,$senhaCadastro,$cargo,$imagem);
                         }else{
                            echo '<div class="erro">A senha tem que ser a mesma.</div>';
                         }
                        
                     }else{
                        echo '<div class="erro">A senha tem que ter pelo menos 7 caracteres ou mais....</div>';
                     }
                   
                 }else{
                    echo '<div class="erro">E-mail inválido....</div>';
                 }
                 
             }
    
            }
            $this->view->render(array('titulo'=>'Registrar'));
        }
        
    }
}