<?php  
namespace Controllers;

class Novo_alunoController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('novo_aluno');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['cadastrar_aluno'])){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                if(empty($nome) || empty($email) || empty($senha)){
                    echo '<div class="erro">preenchar todos os campos!!!</div>';
                }else{
                    $alunos = \MySql::connect()->prepare("INSERT INTO alunos VALUES (null,?,?,?)");
                    $alunos->execute(array($nome,$email,$senha));
                    echo '<script>location.href="novo_aluno"</script>';
                }
            }
            $this->view->render(['titulo'=>'cadastrar novo aluno!!']);
        }else{
            echo '<script>location.href="login"</script>';
        }
        
    }
}