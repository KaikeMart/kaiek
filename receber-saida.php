<?php

    include ("header-entrada.php");
    include ("connection-MySql.php");
    include ("crud-saida.php");
    
    update_Saida($conexao,$_GET["codigo"]);
    header("Location: select-saida.php?removido=true");
	die();

?>