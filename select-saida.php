<?php

    include ("header-saida.php");
    include ("connection-MySql.php");
    include ("crud-saida.php");

?>

	<h3>Lista de Saída de Veículos</h3>

	<?php
	
	if(array_key_exists("removido", $_GET) && $_GET["removido"]=="true"){
	?>
		<h3><b><p class="text-danger"> Valor recebido c/Sucesso!!!</p></h3>	
	<?php
	} ?>	


	<table class="table table-striped">
		
		<tr>
			<th><b> Código </b></th>
			<th><b> Entrada </b></th>
			<th><b> Cliente </b></th>
			<th><b> Telefone </b></th>
			<th><b> Placa </b></th>
			<th><b> Modelo </b></th>
			<th><b> Tipo </b></th>
			<th><b> Porte </b></th>
			<th><b> Valor </b></th>
			<th><b> Receber</b> </th>
		</tr>
<?php


	$listaRegistroVeiculo = select_RegistroVeiculo($conexao);
    
    foreach($listaRegistroVeiculo as $registroVeiculo):
?>
		<tr>
			<td><?= $registroVeiculo['CODIGO'] ?></td>
			<td><?= $registroVeiculo['ENTRADA'] ?></td>
			<td><?= $registroVeiculo['CLIENTE'] ?></td>
			<td><?= $registroVeiculo['TELEFONE'] ?></td>
			<td><?= $registroVeiculo['PLACA'] ?></td>
			<td><?= $registroVeiculo['MODELO'] ?></td>
			<td><?= $registroVeiculo['TIPO'] ?></td>
			<td><?= $registroVeiculo['PORTE'] ?></td>
			<td><?= $registroVeiculo['VALOR'] ?></td>
			<td>
				<a class = "btn btn-success" 
				   href="form-receber.php?codigo=<?=$registroVeiculo['CODIGO']?>">Receber</a>
			</td>
		</tr>
	<?php
		endforeach
	?>

</table>

<?php include("footer.php");?>