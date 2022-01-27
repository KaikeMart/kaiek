<?php
include ("connection-MySql.php");
include ("crud-entrada.php");
require("fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage("L");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(0,10,"Sesi - SENAI",1,1000,"C");
$pdf->Cell(0,10,"# RELATORIO 01 - LISTA DE INSCRICOES DO EVENTO #",1,999,"C");
$pdf->Cell(22,10,"Codigo",1,0,"C");
$pdf->Cell(55,10,"Entrada",1,0,"C");
$pdf->Cell(55,10,"Saida",1,0,"C");
$pdf->Cell(70,10,"Nome",1,0,"C");
$pdf->Cell(45,10,"Telefone",1,0,"C");
$pdf->Cell(30,10,"Placa",1,0,"C");
$pdf->Ln();

$listaRegistroVeiculo = select_RegistroVeiculo($conexao);
    
foreach($listaRegistroVeiculo as $registroVeiculo):
$pdf->Cell(22,10,$registroVeiculo['CODIGO'],1,0,"C");
$pdf->Cell(55,10,$registroVeiculo['ENTRADA'],1,0,"C");
$pdf->Cell(55,10,"",1,0,"C");
$pdf->Cell(70,10,$registroVeiculo['CLIENTE'],1,0,"C");
$pdf->Cell(45,10,$registroVeiculo['TELEFONE'],1,0,"C");
$pdf->Cell(30,10,$registroVeiculo['PLACA'],1,0,"C");
$pdf->Ln();    
endforeach;

$pdf->output();
?>