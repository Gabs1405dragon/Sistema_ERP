<?php  
namespace Controllers;

class Nova_aulaController{
    private $view ;

    public function __construct(){
        $this->view = new \Views\MainView('nova_aula');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['cadastrar_aula'])){
                $nome = $_POST['nome'];
                $modulo_id = $_POST['modulo_id'];
                $link_aula = $_POST['link_aula'];

                if(empty($nome) || empty($modulo_id) || empty($link_aula)){
                    echo '<div class="erro">preenchar todos os campos!!!</div>';
                }else{
                    $alunos = \MySql::connect()->prepare("INSERT INTO aulas VALUES (null,?,?,?)");
                    $alunos->execute(array($nome,$modulo_id,$link_aula));
                    echo '<script>location.href="nova_aula"</script>';
                }
            }
            $this->view->render(['titulo'=>'cadastrar uma nova aula!!']);
        }else{
            echo '<script>location.href="login"</script>';
        }
        
    }
}