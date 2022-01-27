<?php

	include ("connection-MySql.php");
	include ("crud-usuario.php");

	$pessoa = select_usuario($conexao,$_POST["email"],$_POST["senha"]);
	
	if($pessoa == null)
	{	
		header('Location:form-excecao.php');
	}
	else{	
			// Array Pessoa
			$usuario = array();
			$usuario = $pessoa;

			// Sessao
			session_start();
			$_SESSION["EMAIL"]   =  $usuario["EMAIL"];
			$_SESSION["SENHA"] =  $usuario["SENHA"];
	

            header('Location:desktop.php');
		}

?>