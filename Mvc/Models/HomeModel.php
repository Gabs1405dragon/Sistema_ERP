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

    public static function updateServicos($servico){
        $sql = \MySql::connect()->prepare("UPDATE `servicos` SET servicos = ?");
        $sql->execute(array($servico));
    }

    public static function updateCategoria($nome,$slug,$order_id){
        $sql = \MySql::connect()->prepare("UPDATE `categoria` SET nome = ? ,slug = ? WHERE order_id = ?");
        $sql->execute(array($nome,$slug,$order_id));
    }

    public static function updateNoticias($categoria_id,$titulo,$noticia,$data,$slug,$order_id){
        $sql = \MySql::connect()->prepare("UPDATE `noticias` SET  categoria_id = ?, titulo = ?, conteudo = ?, `data` = ?, slug = ? WHERE order_id = ?");
        $sql->execute(array($categoria_id,$titulo,$noticia,$data,$slug,$order_id));
    }

    public static function selectAll($tabela,$start = null,$end = null){
        $sql = \MySql::connect();
        if($start == null && $end == null){
            $sql = $sql->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");
        }else{
            $sql = $sql->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end ");
          
        }
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function generateSlug($str){
        $str = mb_strtolower($str);
        $str = preg_replace('/(â|á|ã)/', 'a',$str);
        $str = preg_replace('/(ê|é)/', 'e',$str);
        $str = preg_replace('/(ì|í)/', 'i',$str);
        $str = preg_replace('/(ó|ô|õ|ò)/', 'o',$str);
        $str = preg_replace('/(ú)/', 'u',$str);
        $str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
        $str = preg_replace('/( )/', '-',$str);
        $str = preg_replace('/ç/', 'c',$str);
        $str = preg_replace('/(-[-]{1,})/', '-',$str);
        $str = preg_replace('/(,)/', '-',$str);
        $str = strtolower($str);

        return $str;
    }

    public static function insertCategoria($categoria,$slug,$order_id,$tabela_nome){
        $sql = \MySql::connect()->prepare("INSERT INTO `$tabela_nome` VALUES (null,?,?,?) ");
        $sql->execute(array($categoria,$slug,$order_id));
    }

    
    public static function insertNoticias($categoria_id,$titulo,$noticia,$data,$slug,$order_id){
        $sql = \MySql::connect()->prepare("INSERT INTO `noticias` (`id`, `categoria_id`, `titulo`, `conteudo`, `data`, `slug`, `order_id`) VALUES (null,?,?,?,?,?,?) ");
        $sql->execute(array($categoria_id,$titulo,$noticia,$data,$slug,$order_id));
    }
/*
    public static function insertCategoria($arr){
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";

        foreach($arr as $key => $value){
            $nome = $key;
            $valor = $value;
            if($nome == 'acao' || $nome == 'nome_tabela'){
                continue;
            }
            if($value == ''){
                $certo = false;
                break;
            }
            $query.=",?";
            $parametros[] = $value;
        }
        $query.=")";
        if($certo == true){
            $sql = \MySql::connect()->prepare($query);
            $sql->execute($parametros);
            $lastId = \MySql::connect()->lastInsertId();
            $sql = \MySql::connect()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastId");
            $sql->execute(array($lastId));
        }
        return $certo;
    }
*/


}