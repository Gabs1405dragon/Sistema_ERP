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
            header('location: home');
            
        }else{

            echo "<div class='erro' >Desculpe mais não tem nenhum usuario com esse email!</div>";
        }
    }

    public static function registrar($nome,$email,$senha,$cargo){
        $sql = \MySql::connect()->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?) ");
        $sql->execute(array($nome,$email,$senha,$cargo));
        echo '<div class="success" >Registrado com sucesso!</div>';
    }
}