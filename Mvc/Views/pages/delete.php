<?php 
    $id = $_GET['id'];
    $sql =\MySql::connect()->prepare("DELETE FROM `clientes` WHERE id = ? ");
    $sql->execute(array($id));
    $sql = \MySql::connect()->prepare("DELETE FROM `financeiro` WHERE cliente_id = ?");
    $sql->execute(array($id));
    header('location: gerenciar_clientes');
?>