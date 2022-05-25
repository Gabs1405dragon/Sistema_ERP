<?php  
namespace Controllers;
class EsqueceuController{
    private $view;
    public function __construct()
    {
        $this->view = new \Views\MainView('esqueceu');
    }

    public function index(){
        if(isset($_SESSION['login'])){
            echo '<script>location.href="home"</script>';
        }else{
            if(isset($_POST['insert_email'])){
                $email = $_POST['email'];
                if(empty($email)){
                    echo '<div class="erro" >Preenchar o campo email.</div>';
                }else{
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                        $verificar = \MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
                        $verificar->execute(array($email));
                        if($verificar->rowCount() == 1){
                            $pegar = $verificar->fetch();
                            $_SESSION['id_email'] = $pegar['id'];
                            echo '<script>location.href="recuperar"</script>';
                        }else{
                            echo '<div class="erro">Esse email não está cadastrado.</div>';
                        }
                    }else{
                        echo '<div class="erro">E-mail invalido....</div>';
                    }
                  
                }
            }
            $this->view->render(['titulo'=>'Coloque o seu e-mail!']);
        }
    }
}