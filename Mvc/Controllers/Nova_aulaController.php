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
                $link_aula = $_FILES['link_aula'];
                $novoArquivo = explode('.',$link_aula['name']);
                $sucesso = true;
                
                if($novoArquivo[sizeof($novoArquivo)-1] != 'mp4' && $novoArquivo[sizeof($novoArquivo)-1] != 'mkv' && $novoArquivo[sizeof($novoArquivo)-1] != 'avi'){
                    $sucesso = false;
                    echo '<div class="erro">Voce não pode fazer upload deste tipo de arquivo!</div>';  
                }else{
                    move_uploaded_file($link_aula['tmp_name'],BASE_DIR_PAINEL.'/video/'.$link_aula['name']);
                }

                if($sucesso){
                    if(empty($nome) || empty($modulo_id) || empty($link_aula)){
                            echo '<div class="erro">preenchar todos os campos!!!</div>';
                        }else{
                            $alunos = \MySql::connect()->prepare("INSERT INTO aulas VALUES (null,?,?,?)");

                            $alunos->execute(array($nome,$modulo_id,$link_aula['name']));
                            echo '<script>location.href="nova_aula"</script>';
                        }
                    
                }
              
            }
            $this->view->render(['titulo'=>'cadastrar uma nova aula!!']);
        }else{
            echo '<script>location.href="login"</script>';
        }
        
    }
}