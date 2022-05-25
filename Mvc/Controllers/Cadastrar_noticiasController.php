<?php 
namespace Controllers;
class Cadastrar_noticiasController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('cadastrar_noticias');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['acao_noticia'])){
                $titulo = $_POST['titulo'];
                $categoria = $_POST['categoria_id'];
                $order_id = $_POST['order_id'];
                $noticia = $_POST['noticia'];
                $slug = $_POST['slug'];
                $data = $_POST['data'];
               
                if(empty($titulo) || empty($noticia) || empty($data)){
                    echo '<div class="erro" >preencha todos os campos para a noticia está completa!</div>';
                }else{
                   
                        \Models\HomeModel::insertNoticias($categoria,$titulo,$noticia,$data,$slug,$order_id);
                        header('location: cadastrar_noticias');
                   
                }
                
            }
            $this->view->render(array('titulo'=>'cadastra a noticia do dia!'));
        }else{
            header('location: login');
        }
    }
}