<?php  
namespace Controllers;
class Cadastrar_clientesController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('cadastrar_clientes');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['cadastrar_cliente'])){   
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $tipo = $_POST['pessoa_cliente'];
                $cpf = '';
                $cnpj = '';
                if($tipo == 'fisico'){
                    $cpf = $_POST['cpf'];
                }else if($tipo == 'juridico'){
                    $cnpj = $_POST['cnpj'];
                };
                $imagem = $_FILES['imagem'];
                $success = true;
                $arquivo = explode('.',$imagem['name']);

                if($arquivo[sizeof($arquivo)-1] != 'jpg' && $arquivo[sizeof($arquivo)-1] != 'png' && $arquivo[sizeof($arquivo)-1] != 'jpeg'){
                    echo  'Essa imagem é ivalida..';
                    $success = false;
                }

                if($success){

                }
                    if(empty($nome) || empty($email) || empty($tipo) || empty($imagem)){
                            echo "não é permitido enviar campos vazios";
                    }else{
                        move_uploaded_file($imagem['tmp_name'],BASE_DIR_PAINEL.'uploads/'.$imagem['name']);
                            $sql = \MySql::connect()->prepare("INSERT INTO `clientes` VALUES (null,?,?,?,?,?) ");
                            $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
                            $sql->execute(array($nome,$email,$tipo,$dadoFinal,$imagem['name']));
                    }

            }
            $this->view->render(array('titulo'=>'cadastrar os clientes '));
        }else{
            header('location: login');
        }
    }
}