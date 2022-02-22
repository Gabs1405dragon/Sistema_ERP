<?php  
namespace Controllers;
class Edit_clienteController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('edit_cliente');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['alterar_cliente'])){
                $id = $_GET['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $tipo = $_POST['pessoa_cliente'];
                $cpf = $_POST['cpf'];
                $cnpj = $_POST['cnpj'];
                $imagem = $_FILES['imagem'];
                $imagem = '';
                if(empty($nome) || empty($email) ){
                    echo '<div class="erro" >Preenchar todos os campos!</div>';
                }else{
                   $dados = $cpf == 'fisico' ? $cpf : $cnpj;
                   \Models\HomeModel::upadateClientes($nome,$email,$tipo,$dados,$imagem,$id);
                   header('location: gerenciar_clientes');
                }
            }
            $this->view->render(array('titulo'=>'altera a configuração do cliente!'));
        }else{
            header('location: login');
        }
    }
}