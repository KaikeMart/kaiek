<?php
    include ("header-entrada.php");
    include ("connection-MySql.php");
    include ("crud-saida.php");
    $valorLiquido = $_POST["valorLiquido"];
    $valorDesconto = $_POST["valorDesconto"];
    $valorPago = $_POST["valorPago"];
    $valorTotal = $valorLiquido-(($valorLiquido/100)*$valorDesconto);
    $valorTroco = $valorPago-$valorTotal;
    update_Valores($conexao,$_POST["codigo"],$valorLiquido,$valorDesconto,$valorPago,$valorTotal,$valorTroco);
    header("Location: select-saida.php?removido=true");
	die();
?>