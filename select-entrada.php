<?php

    include ("header-entrada.php");
    include ("connection-MySql.php");
    include ("crud-entrada.php");

?>

	<h3>Lista de Entrada de Veículos</h3>

	<?php
	
	if(array_key_exists("removido", $_GET) && $_GET["removido"]=="true"){
	?>
		<h3><b><p class="text-danger"> Registro do Veículo Excluido c/Sucesso!!!</p></h3>	
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
			<th><b> Editar</b> </th>
			<th><b> Excluir</b> </th>
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
				<a class = "btn btn-warning" 
				   href="form-update-entrada.php?codigo=<?=$registroVeiculo['CODIGO']?>">Editar</a>
			</td>
			<td>
				<form action="delete-entrada.php" method = "post">
					<input type="hidden" name="identrada" value="<?=$registroVeiculo['CODIGO']?>">
					<button class="btn btn-danger">Excluir</button> 
				</form>
			</td>
		</tr>
	<?php
		endforeach
	?>

</table>

<?php include("footer.php");?>