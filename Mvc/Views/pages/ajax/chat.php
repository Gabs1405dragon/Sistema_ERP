<?php  
include('../../../MySql.php');

define("PATH_FULL","http://localhost/teste/git/Mvc/Views/pages");
session_start();
$data['sucesso'] = true;
$data['mensagem'] = '';

if(!isset($_SESSION['login'])){
	die('você não esta logado');
}

if(isset($_POST['acao']) && $_POST['acao'] == 'inserir_mensagem'){
$mensagem = $_POST['mensagem'];
$nome = $_SESSION['nome'];
$user_id = $_SESSION['user_id'];

$sql = \MySql::connect()->prepare("INSERT INTO chat VALUES (null,?,?,?)");
$sql->execute(array($user_id,$nome,$mensagem));

echo '
	  <div class="chat">
                        <h3>'.$nome.'</h3>
                        <p>'.$mensagem.'</p>
                    </div> 
';
$_SESSION['lastIdChat'] = \MySql::connect()->lastInsertId();

}else if(isset($_POST['acao']) && $_POST['acao'] == 'pegarMensagens'){
	$lastId = $_SESSION['lastIdChat'];
	$sql = \MySql::connect()->prepare("SELECT * FROM chat WHERE id > $lastId");
	$sql->execute();
	$mensagens = $sql->fetchAll();
	$mensagens = array_reverse($mensagens);
	foreach($mensagens as $key =>  $value){
		$nomeUsuario = \MySql::connect()->prepare("SELECT * FROM usuarios WHERE id = $value[user_id] ");
		$nomeUsuario->execute();
		$nomeUsuario = $nomeUsuario->fetch();
		echo '
			  <div class="chat">
		                        <h3>'.$value['nome'].'</h3>
		                        <p>'.$value['mensagem'].'</p>
		                    </div> 
		';
		$_SESSION['lastIdChat'] = $value['id'];
	}
	
}
?>