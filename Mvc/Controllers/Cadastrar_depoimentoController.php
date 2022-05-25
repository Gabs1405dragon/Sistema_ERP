<?php 
namespace Controllers;
class Cadastrar_depoimentoController{
    private $view;
    public function __construct()
    {
        $this->view = new \Views\MainView('cadastrar_depoimento');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            
            if(isset($_POST['mandar'])){
                $nome = $_POST['nome_pessoa'];
                $depoimento = $_POST['depoimento'];
                $date = $_POST['date'];
                $order_id = $_POST['order_id'];
                if(empty($nome) || empty($depoimento) || empty($date)){
                    echo '<div class="erro" >Campos vázios Não são permitidos!</div>';
                }else{
                    \Models\HomeModel::insert($nome,$depoimento,$date,$order_id );
                    echo '<script>location.href="cadastrar_depoimento"</script>';
                }
                
            }
            $this->view->render(array('titulo'=>'Registrar Depoimento'));
        }else{

            echo '<script>location.href="login"</script>';
        }
    }
}