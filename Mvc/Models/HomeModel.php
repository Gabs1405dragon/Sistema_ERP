<?php 
namespace Models;

class HomeModel{

    public static function imageValida($imagem){
        if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'){
            $tamanho = intval($imagem['size']/1024);
            if($tamanho < 900)
                return true;
            else
                return false;
            
        }else{
            return false;
        }
    }

    public static function uploadFile($file){
        $formatoArquivo = explode('.',$file['name']);
        $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
        if(move_uploaded_file($file['tmp_name'],PATH_FULL.'/uploads/'.$imagemNome)){
            return $imagemNome;
        }else{
            return false;
        }
    }

    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

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

    public static function updateCategoria($nome,$slug,$order_id,$id){
        $sql = \MySql::connect()->prepare("UPDATE `categoria` SET nome = ? ,slug = ? , order_id = ? WHERE `categoria`.`id` = $id");
        $sql->execute(array($nome,$slug,$order_id));
    }

    public static function updateNoticias($categoria_id,$titulo,$noticia,$data,$slug,$order_id){
        $sql = \MySql::connect()->prepare("UPDATE `noticias` SET  categoria_id = ?, titulo = ?, conteudo = ?, `data` = ?, slug = ? WHERE order_id = ?");
        $sql->execute(array($categoria_id,$titulo,$noticia,$data,$slug,$order_id));
    }

    public static function updateSite($titulo,$nome_author,$descricao,$titulo_icon1,$titulo_icon2,$icon1,$descricao1,$icon2,$descricao2,$titulo_icon3,$icon3,$descricao3){
        $sql = \MySql::connect()->prepare("DELETE FROM `config` ");
        $sql->execute();
        $sql = \MySql::connect()->prepare("INSERT INTO `config` VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->execute(array($titulo,$nome_author,$descricao,$titulo_icon1,$titulo_icon2,$icon1,$descricao1,$icon2,$descricao2,$titulo_icon3,$icon3,$descricao3));
    }

    public static function upadateClientes($nome,$email,$tipo,$cpf,$imagem,$id){
        $sql = \MySql::connect()->prepare("UPDATE `clientes` SET  nome = '$nome' ,email = '$email' ,tipo = '$tipo' ,cpf_cnpj = '$cpf' , imagem = '$imagem' WHERE `clientes`.`id` = $id");
        $sql->execute();
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



    //usuarios onlines

    public static function updateUsuarioOnline(){
        $pdo = \MySql::connect();
        if(isset($_SESSION['online'])){
            $token = $_SESSION['online'];
            $horarioAtual = date('Y-m-d H:i:s');
            $check = $pdo->prepare("SELECT `id` FROM `online` WHERE token = ?");
            $check->execute(array($_SESSION['online']));

            if($check->rowCount() == 1){
                $sql = $pdo->prepare("UPDATE `online` SET ultima_acao = ? WHERE token = ? ");
                $sql->execute(array($horarioAtual,$token));
            }else{
                if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            };
               
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = $pdo->prepare("INSERT INTO `online` VALUES (null,?,?,?) ");
                $sql->execute(array($ip,$horarioAtual,$token));
            }

        }else{
            $_SESSION['online'] = uniqid();
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            };
           
            $token = $_SESSION['online'];
            $horarioAtual = date('Y-m-d H:i:s');
            $sql = $pdo->prepare("INSERT INTO `online` VALUES (null,?,?,?)");
            $sql->execute(array($ip,$horarioAtual,$token));
        }
    }

    public static function limparUsuariosOnline(){
        $pdo = \MySql::connect();
        $date = date('Y-m-d H:i:s');
        $sql = $pdo->prepare("DELETE FROM `online` WHERE ultimo_acao < '$date' - INTERVAL 1 MINUTE");
        return $sql->execute();
    }

    public static function listarUsuariosOnline(){
        $pdo = \MySql::connect();
        self::limparUsuariosOnline();
        $sql = $pdo->prepare("SELECT * FROM `online` ");
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function contador(){
        $pdo = \MySql::connect();
        if(!isset($_COOKIE['visita'])){
            setcookie('visita',true,time() + (60*60/24*7));
            $sql = $pdo->prepare("INSERT INTO `visitas` VALUES (null,?,?)");
            $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));            
        }
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