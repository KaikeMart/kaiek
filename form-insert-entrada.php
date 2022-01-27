<?php

    include ("header-entrada.php");
    include ("connection-MySql.php");
    include ("crud-entrada.php");

    // Data/Hora do Sistema
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("d/m/y");
    $hora = date("H:i:s");
    $datahora = $data.'-'.$hora;

?>

  <h3>→ Registro de Entrada de Veículo</h3>
  <br>
  <b>
	<form action="insert-entrada.php" method="post">

    <?php
            $listaModelo = select_Modelo($conexao);
            $listaTipo = select_Tipo($conexao);
            $listaPorte = select_Porte($conexao);
    ?>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Data\Hora Entrada:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="datahora1" value=<?=	$datahora?> readonly>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nome do Cliente:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="nomeCliente" placeholder="Informe o Nome Completo do Cliente" required>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Telefone Móvel do Cliente:</label>
      <input type="tel" class="form-control" id="exampleFormControlInput1" name="telefoneCliente" minlength="12" maxlength="12" pattern="[0-9]{3}[9]{1}[0-9]{8}" placeholder="Informe o Telefone Móvel do Cliente - DDD+9+Número (apenas os algarismos)" required>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Placa do Veículo:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="placaveiculo" placeholder="Informe a Placa do Veículo" required>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Modelo do Veículo:</label>
      <select class="form-control" id="exampleFormControlSelect1" name="modeloveiculo" required>
          <?php foreach($listaModelo as $modelo): ?>
                <option value="<?=$modelo['IDMV']?>"><?=$modelo['MODELODESC']?></option>
          <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo do Veículo:</label>
      <select class="form-control" id="exampleFormControlSelect1" name="tipoveiculo" required>
          <?php foreach($listaTipo as $tipo): ?>
                <option value="<?=$tipo['IDTV']?>"><?=$tipo['TIPODESC']?></option>
          <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Porte do Veículo:</label>
      <select class="form-control" id="exampleFormControlSelect1" name="porteveiculo" required>
          <?php foreach($listaPorte as $porte): ?>
                <option value="<?=$porte['IDPV']?>"><?=$porte['PORTEDESC']?></option>
          <?php endforeach ?>
      </select>
    </div>
    
    <input class="btn btn-success" type="submit" value="Adicionar"/>
    <input class="btn btn-secondary" type="reset" value="Cancelar"/>

  </form>
