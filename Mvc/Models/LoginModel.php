<?php  
namespace Models;

class LoginModel{
    
    public static function logar($email,$senha){
       
        $sql = \MySql::connect()->prepare("SELECT * FROM `usuarios` WHERE email = ? AND senha = ?");
        $sql->execute(array($email,$senha));
        if($sql->rowCount() == 1){
            $dados = $sql->fetch();
            $_SESSION['login'] = $email;
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['cargo'] =$dados['cargo'];
            $_SESSION['id'] = $dados['id'];
            $_SESSION['imagem'] = $dados['imagem'];
            header('location: home');
            
        }else{

            echo "<div class='erro' >Desculpe mais não tem nenhum usuario com esse email!</div>";
        }
    }

    public static function registrar($nome,$email,$senha,$cargo,$imagem){

        $novoArquivo = explode('.',$imagem['name']);
        $sucesso = true;
        
        if($novoArquivo[sizeof($novoArquivo)-1] != 'jpg' && $novoArquivo[sizeof($novoArquivo)-1] != 'png' && $novoArquivo[sizeof($novoArquivo)-1] != 'gif'){
            $sucesso = false;
            echo '<div class="erro">Voce não pode fazer upload deste tipo de arquivo!</div>';  
         }else{
             move_uploaded_file($imagem['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagem['name']);
         }

        if($sucesso){
            $sql = \MySql::connect()->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?,?) ");
            $sql->execute(array($nome,$email,$senha,$cargo,$imagem['name']));
            echo '<div class="success" >Registrado com sucesso!</div>';
        }

    }
}