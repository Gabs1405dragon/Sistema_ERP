<?php  
namespace Models;

class LoginModel{
    
    public static function logar($email,$senha){
       
        $sql = \MySql::connect()->prepare("SELECT * FROM `usuarios` WHERE email = ? ");
        $sql->execute(array($email));
        if($sql->rowCount() == 1){
            $dados = $sql->fetch();
            $senhaBanco = $dados['senha'];
            if(\Bcrypt::check($senha,$senhaBanco)){
                setcookie('Painel',true,time()+(24*24*24*7),'/');
                $_SESSION['login'] = $email;
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['cargo'] = $dados['cargo'];
                $_SESSION['user_id'] = $dados['id'];
                $_SESSION['imagem'] = $dados['imagem'];
                echo '<script>location.href="home"</script>';
            }else{
                echo '<div class="erro">Senha incorreta...</div>';
            }
            
            
        }else{

            echo "<div class='erro' >Desculpe mais não tem nenhum usuário com esse email!</div>";
        }
    }

    public static function registrar($nome,$email,$senha,$cargo,$imagem){

        $novoArquivo = explode('.',$imagem['name']);
        $sucesso = true;
        
        if($novoArquivo[sizeof($novoArquivo)-1] != 'jpg' && $novoArquivo[sizeof($novoArquivo)-1] != 'png' && $novoArquivo[sizeof($novoArquivo)-1] != 'gif'){
            $sucesso = false;
            echo '<divclass="erro">Voce não pode fazer upload deste tipo de arquivo!</div>';  
         }

        if($sucesso){
            $verificar = \MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
            $verificar->execute(array($email));
            if($verificar->rowCount() == 1){
                echo '<div class="erro">Já existe alguem cadastrado com esse email.</div>';
            }else{
             move_uploaded_file($imagem['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagem['name']);    
            $sql = \MySql::connect()->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?,?) ");
            $sql->execute(array($nome,$email,$senha,$cargo,$imagem['name']));
            echo '<div class="success" >Registrado com sucesso!</div>';
            }
            
        }

    }
}