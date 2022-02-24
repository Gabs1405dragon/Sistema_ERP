<?php  
namespace Controllers;
class Editar_siteController{
    private $view;

    public function __construct(){
        if(isset($_POST['site'])){
            $titulo = $_POST['titulo'];
            $nome_author = $_POST['nome_author'];
            $descricao = $_POST['descricao'] ;
            $titulo_icon1 = $_POST['titulo_icon1'] ;
            $titulo_icon2 = $_POST['titulo_icon2'] ;
            $icon1 = $_POST['icon1'] ;
            $descricao1 = $_POST['descricao1'] ;
            $icon2 = $_POST['icon2'] ;
            $descricao2 = $_POST['descricao2'];
            $titulo_icon3 = $_POST['titulo_icon3'] ;
            $icon3 = $_POST['icon3'] ;
            $descricao3  = $_POST['descricao3'];
            if(empty($titulo) && empty($nome_author) && empty($descricao) && empty($descricao1) && empty($descricao2) && empty($descricao3)){
               echo '<div class="erro">Não é permitido campos vázios</div>'; 
            }else{
               
                \Models\HomeModel::updateSite($titulo,$nome_author,$descricao,$titulo_icon1,$titulo_icon2,$icon1,$descricao1,$icon2,$descricao2,$titulo_icon3,$icon3,$descricao3);
                header('location: Editar_site');
            }
        }
        $this->view = new \Views\MainView('Editar_site');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'Pagina para editar o site'));
        }else{
            header('location: login');
        }
    }
}