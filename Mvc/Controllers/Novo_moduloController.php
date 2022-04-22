<?php  
namespace Controllers;

class Novo_moduloController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('novo_modulo');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['cadastrar_modulo'])){
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
              

                if(empty($nome) || empty($descricao)){
                    echo '<div class="erro">preenchar todos os campos!!!</div>';
                }else{
                    $alunos = \MySql::connect()->prepare("INSERT INTO modulos VALUES (null,?,?)");
                    $alunos->execute(array($nome,$descricao));
                    echo '<script>location.href="novo_modulo"</script>';
                }
            }
            $this->view->render(['titulo'=>'cadastrar novo módulo!!']);
        }else{
            echo '<script>location.href="login"</script>';
        }
        
    }
}