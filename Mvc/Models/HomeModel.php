<?php 
namespace Models;

class HomeModel{
    public static function selecionandoMenu($par){
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par)
            echo 'class="menu-active"';
    }

    public static function insert($nome,$depoimento,$data,$order_id){
        $sql = \MySql::connect()->prepare("INSERT INTO `depoimentos` VALUES (null,?,?,?,?)");
        $sql->execute(array($nome,$depoimento,$data,$order_id));
        echo '<div class="success" >O cadastro do depoimento foi realizado com sucesso!</div>';
    }

    public static function insertServico($servico){
        $sql = \MySql::connect()->prepare("INSERT INTO `servicos` VALUES (null,?)");
        $sql->execute(array($servico));
        
    }

    public static function atualizarUsuario($nome,$senha){
        $sql = \MySql::connect()->prepare("UPDATE `usuarios` SET nome = ? ,senha = ? WHERE email = ? ");
        
        if($sql->execute(array($nome,$senha,$_SESSION['login']))){
            return true;
        }else{
            return false;
        }
    }

    public static function cadastrarUsuario($nome,$email,$senha,$cargo){
        $sql = \MySql::connect()->prepare("INSERT INTO `usuarios`  (id,nome,email,senha,cargo) VALUES (null,?,?,?,?)");
        $sql->execute(array($nome,$email,$senha,$cargo));
        
    }

    public static function deletar($tabela,$id = false){
        if($id == false){
            $sql = \MySql::connect()->prepare("DELETE FROM `$tabela`");
        }else{
            $sql = \MySql::connect()->prepare("DELETE FROM `$tabela` WHERE id = $id ");
        }
        $sql->execute();
    }

    public static function select($table,$query = '',$arr = ''){
        if($query == false){
            $sql = \MySql::connect()->prepare("SELECT * FROM `$table` WHERE $query");
            $sql->execute($arr);
        }else{
            $sql = \MySql::connect()->prepare("SELECT * FROM `$table` ");
            $sql->execute();
        }
        return $sql->fetch();
    }

    public static function updateDepoimento($nome,$depoimento,$date){
        $sql = \MySql::connect()->prepare("UPDATE `depoimentos` SET nome = ?,depoimento = ? WHERE date = ?");
        $sql->execute(array($nome,$depoimento,$date));
    }
}