<?php

    include ("connection-MySql.php");
    include ("crud-entrada.php");
    
    define('FPDF_FONTPATH','font/');
    require('fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Courier','',10);

    $listaRegistroVeiculo = select_RegistroVeiculo($conexao);

    // Cabeçalho I
    $pdf->Cell(193,6,utf8_decode('SESI - SENAI'),1,1,"C");
	$pdf->Cell(193,6,utf8_decode('# RELATÓRIO 01 - LISTA DE INSCRIÇÕES DO EVENTO # '),1,1,"C");

    // Cabeçalho II
    foreach($listaRegistroVeiculo as $registro):

        $pdf->Cell(193, 6, utf8_decode("Código do Evento: ").$registro['CODIGO'],1,0,"L");
        $pdf->ln();	

        $pdf->Cell(193, 6, utf8_decode("Entrada: ").utf8_decode($registro['ENTRADA']),1,0,"L");	
        $pdf->ln();	

        // $pdf->Cell(193, 6, "Saida: ".utf8_decode($registro['DATAHORA2']),1,0,"L");	
        // $pdf->ln();	

        $pdf->Cell(193, 6, utf8_decode("Nome: ").$registro['CLIENTE'],1,0,"L");	
        $pdf->ln();	

        $pdf->Cell(193, 6, utf8_decode("Telefone: ").$registro['TELEFONE'],1,0,"L");
        $pdf->ln();	
    
        $pdf->Cell(193, 6, utf8_decode("Placa: ").$registro['PLACA'],1,0,"L");
        $pdf->ln();	

    endforeach;

    // // Coluna Cabeçalho
    // $pdf->Cell(10, 6,utf8_decode('Nº'),1,0,"C");
    // $pdf->Cell(23, 6,utf8_decode('INSCRIÇÃO'),1,0,"C");
    // $pdf->Cell(100, 6,'NOME',1,0,"C");
    // $pdf->Cell(60, 6,'ASSINATURA',1,0,"C");

    // // Contador
    // $i = 1;
    
    // // Coluna Dados
    // foreach($listaInscricao as $inscricao):

    //     $pdf->ln();
    //     $pdf->Cell(10, 6, $i++,1,0,"C");
    //     $pdf->Cell(23, 6, $inscricao['IDEI'],1,0,"C");
    //     $pdf->Cell(100, 6, $inscricao['NOME'],1,0,"L");
    //     $pdf->Cell(60, 6,'',1,0,"C");        
    
    // endforeach;
	
    // // Rodapé
	// date_default_timezone_set('America/Sao_Paulo');
	// $datehora = date('d-m-Y H:i');
	// $pdf->ln();
	// $pdf->ln();

    // $pdf->Cell(193, 6,utf8_decode('Setor de Extensão FapBetim'));
    // $pdf->ln();
	
    // $pdf->Cell(193, 6,utf8_decode('Data\Hora Emissão: ').$datehora,0,0,"L");
    // $pdf->ln();

    // $pdf->SetFont('Courier','',7);
    // $pdf->Cell(193, 6,utf8_decode('desenvolvimento de sistemas weeb - Versão 2.0'));
    // $pdf->Output();

?>