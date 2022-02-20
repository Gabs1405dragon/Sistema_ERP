<?php  
namespace Controllers;

class Edit_noticiasController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('edit_noticias');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_SESSION['login'])){
                if(isset($_POST['acao_noticia'])){
                    $titulo = $_POST['titulo'];
                    $categoria = $_POST['categoria_id'];
                    $order_id = $_POST['order_id'];
                    $noticia = $_POST['noticia'];
                    $slug = $_POST['slug'];
                    $data = $_POST['data'];
                   
                    if(empty($titulo) && empty($noticia) && empty($data)){
                        echo '<div class="erro" >preencha todos os campos para a noticia está completa!</div>';
                    }else{
                       
                            \Models\HomeModel::updateNoticias($categoria,$titulo,$noticia,$data,$slug,$order_id);
                            header('location: gerenciar_noticias');
                       
                    }}
                    
                }
            $this->view->render(array('titulo'=>'Alterar noticias'));
        }else{
            header('location: login');
        }
    }
}