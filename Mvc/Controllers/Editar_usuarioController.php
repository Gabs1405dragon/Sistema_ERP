<?php
namespace Controllers;
class Editar_usuarioController{
    private $view;
    public function __construct()
    {
        $this->view = new \Views\MainView('editar_usuario');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            
               
            if(isset($_POST['acao'])){
                $nomeEdit = $_POST['nome_edit'];
                $senhaEdit = $_POST['senha_edit'];
                $imagem = $_FILES['imagem'];
                $id = $_GET['id'];
                
                if(empty($nomeEdit) || empty($senhaEdit)){
                    echo '<div class="erro" >Campos vázios não são permitidos!</div>';
                }else{
                    \Models\HomeModel::atualizarUsuario($nomeEdit,$senhaEdit,$imagem,$id);
                    header("location: editar_usuario?id=$id");
                }
            }
            $this->view->render(array('titulo'=>'edite o seu nome e senha de usuário!'));
        }else{
            header('location: home');
        }
    }
}