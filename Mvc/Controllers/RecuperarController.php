<?php  
namespace Controllers;

class RecuperarController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('recuperar');
    }

    public function index(){
        if(isset($_SESSION['id_email'])){
            if(isset($_POST['alter_password'])){
                $senha = $_POST['senha'];
                $confSenha = $_POST['confSenha'];
                if(empty($senha) || empty($confSenha)){
                    echo '<div class="erro">Preenchar os dois campos!!</div>';
                }else{
                    if(strlen($senha) >= 7){
                        if($confSenha == $senha){
                            $senha = \Bcrypt::hash($senha);
                            $sql = \MySql::connect()->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
                            $sql->execute(array($senha,$_SESSION['id_email']));
                            echo '<script>location.href="login"</script>';
                        }else{
                            echo '<div class="erro">as duas senhas tem que ser iguais!!</div>';
                        }
                    }else{
                        echo '<div class="erro">A senha precisa ter pelo menos 7 caracteres!!</div>';
                    }
                }
            }
            $this->view->render(['titulo'=>'Crie uma nova senha de acesso!!']);
        }else{
            echo '<script>location.href="login"</script>';
        }
    }
}