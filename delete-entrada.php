<?php 
	
    include ("header-entrada.php");
    include ("connection-MySql.php");
    include ("crud-entrada.php");

	delete_Entrada($conexao,$_POST['identrada']);
	header("Location: select-entrada.php?removido=true");
	die();

?>