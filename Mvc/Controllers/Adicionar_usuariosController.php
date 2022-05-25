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
                $confSenha = $_POST['confSenha'];
                $cargo = $_POST['cargos'];
                $imagem = $_FILES['imagem'];
                $novoArquivo = explode('.',$imagem['name']);
                $sucesso = true;
                
                if($novoArquivo[sizeof($novoArquivo)-1] != 'jpg' && $novoArquivo[sizeof($novoArquivo)-1] != 'png' && $novoArquivo[sizeof($novoArquivo)-1] != 'gif'){
                    $sucesso = false;
                    echo '<div class="erro">Voce não pode fazer upload deste tipo de arquivo!</div>';  
                }

                if($sucesso){
                    if(empty($nome) || empty($email) || empty($senha) || empty($cargo)){
                        echo '<div class="erro" >Preenchar todos os campos!!</div>';
                    }else{
                        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                            if(strlen($senha)){
                                if($confSenha == $senha){
                                    move_uploaded_file($imagem['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagem['name']);
                                    $senha = \Bcrypt::hash($senha);
                                     \Models\HomeModel::cadastrarUsuarios($nome,$email,$senha,$cargo,$imagem['name']);
                                    echo '<script>location.href="adicionar_usuarios"</script>';
                                }else{
                                    echo '<div class="erro">As duas senha tem que ser iguais..</div>';
                                }
                            }else{
                                echo '<div class="erro">A senha tem que ter pelo menos 7 ou mais caracteres..</div>';
                            }
                        }else{
                            echo '<div class="erro">E-mail inválido...</div>';
                        }
                        
                    }
                }
            }
        $this->view->render(array('titulo'=>'Adicione um usuario novo!'));
        }else{
            header('location: login');
        }
        
    }
}