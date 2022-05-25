<?php 
namespace Controllers;
class Cadastrar_empreendimentoController{
    private $view;
    public function __construct(){
        $this->view = new \Views\MainView('cadastrar_empreendimento');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            if(isset($_POST['cadastrar_empreendimento'])){
                $nome = $_POST['nome_empreendimento'];
                $tipo = $_POST['tipo_empreendimento'];
                $preco = \Models\HomeModel::formatarMoedaBd($_POST['preco']);
                $imagem = $_FILES['image'];
                $novoArquivo = explode('.',$imagem['name']);
                $sucesso = true;
                

                if($novoArquivo[sizeof($novoArquivo)-1] != 'jpg' && $novoArquivo[sizeof($novoArquivo)-1] != 'png' && $novoArquivo[sizeof($novoArquivo)-1] != 'jpeg'){
                    $sucesso = false;
                    echo '<div class="erro">Voce não pode fazer upload deste tipo de arquivo!</div>';
                    
                 }else{
                   
                     move_uploaded_file($imagem['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagem['name']);

               
                 }

                 if($sucesso){
                    if(empty($nome) || empty($tipo) || empty($preco) ){
                        echo '<div class="erro" >Você não pode deixar os campos vazios!</div>';
                    }else{
                        $slug = \Models\HomeModel::generateSlug($nome);
                        $sql = \MySql::connect()->prepare("INSERT INTO `empreendimento` VALUES (null,?,?,?,?,?,?)");
                        $sql->execute(array($nome,$tipo,$preco,$imagem['name'],$slug,0));
                        $lastId = \MySql::connect()->lastInsertId();
                        \MySql::connect()->exec("UPDATE `empreendimento` SET order_id = $lastId WHERE id = $lastId ");
                        echo '<div class="success" >O cadastro foi feito com sucesso!</div>';
                    }
                 }
                


           }
            $this->view->render(array('titulo'=>'Cadastrar todos os seus empreendimentos!'));
        }else{
            header('location: login');
        }
    }
}