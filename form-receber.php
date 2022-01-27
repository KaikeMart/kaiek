<?php

    include ("header-entrada.php");
    include ("connection-MySql.php");
    include ("crud-saida.php");

    // Função
    // $registroVeiculo = select_update_Entrada($conexao,$_GET["codigo"]);
    $VregistroVeiculo = select_Valor_RegistroVeiculo($conexao,$_GET["codigo"]);
    update_Saida($conexao,$_GET["codigo"]);
    
?>

  <h3>→ Pagamento</h3>
  <br>
  <b>
	<form action="./registrar-receber.php" method="post">
    
    <div class="form-group">
      <label for="exampleFormControlSelect1">Codigo Registro:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="codigo"  value="<?=$VregistroVeiculo['CODIGO']?>" readonly>
    </div>

  <div class="form-group">
      <label for="exampleFormControlSelect1">Valor:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="valorLiquido"  value="<?=$VregistroVeiculo['VALOR']?>" readonly>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Desconto:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="valorDesconto">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Valor Pago:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="valorPago">
    </div>

    <input class="btn btn-success" type="submit" name="Calcular" value='Calcular' />
  </form>
