<?php 
namespace Controllers;
class Cadastrar_categoriasController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('cadastrar_categorias');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['mandar_categoria'])){
                $categoria = $_POST['categoria'];
                $slug = $_POST['slug'];
                $order_id = $_POST['order_id'];
                if(empty($categoria)){
                    echo '<div class="erro" >o campo da categoria esta vázio!</div>';
                }else{
                    //$slug = \Models\HomeModel::generateSlug($categoria);

                    //$arr = ['nome'=>$categoria,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'categorias'];
                    \Models\HomeModel::insertCategoria($categoria,$slug,$order_id,'categoria');
                    header('location: cadastrar_categorias');
                }
            }
            $this->view->render(array('titulo'=>'cadastre a sua categoria!'));
        }else{
            header('location: login');
        }
    }
}