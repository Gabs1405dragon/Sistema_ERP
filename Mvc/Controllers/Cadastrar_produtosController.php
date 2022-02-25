<?php
namespace Controllers;

class Cadastrar_produtosController{
    private $view;

    public function __construct(){
        $this->view = new \Views\MainView('cadastrar_produtos');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            $this->view->render(array('titulo'=>'cadastrar o produto que você deseja!'));
        }else{
            header('location: login');
        }
    }
}