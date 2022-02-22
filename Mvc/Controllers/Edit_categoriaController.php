<?php 
namespace Controllers;

class Edit_categoriaController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView("edit_categoria");
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['edit_categoria'])){
                $nome = $_POST['edit_nome'];
                $slug = $_POST['slug'];
                $order_id = $_POST['order_id'];
                $id = $_GET['id'];
                if(empty($nome)){
                    echo '<div class="erro" >Não deixe o campo vázio</div>';
                }else{
                    \Models\HomeModel::updateCategoria($nome,$slug,$order_id,$id);
                    header('location: gerenciar_categorias');
                }
            }
            $this->view->render(array('titulo'=>'Edita a categoria'));
        }else{
            header('location: login');
        }
    }
}