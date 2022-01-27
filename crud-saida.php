<?php

    // Select Registro Veiculo
	function select_RegistroVeiculo($conexao){
	    
        $listaRegistroVeiculo = array();

		$query = "SELECT * 
                    FROM VREGISTROVEICULO 
                WHERE SAIDA IS NULL
                ORDER BY ENTRADA DESC";

		$resultado = mysqli_query($conexao,$query);
		
        while($registroVeiculo = mysqli_fetch_assoc($resultado))
        {
            array_push($listaRegistroVeiculo,$registroVeiculo);
		}

		return $listaRegistroVeiculo;
	}  
    function update_Saida($conexao,
                          $codigo){

		$query = "UPDATE REGISTROVEICULO 
                     SET DATAHORA2 = now()
		        WHERE IDRV = '{$codigo}'";
                
	    return mysqli_query($conexao,$query);
    }
    function select_RegistroVeiculo_Saida($conexao){
	    
        $listaRegistroVeiculo = array();

		$query = "SELECT * 
                    FROM VREGISTROVEICULO 
                ORDER BY CLIENTE ASC";

		$resultado = mysqli_query($conexao,$query);
		
        while($registroVeiculo = mysqli_fetch_assoc($resultado))
        {
            array_push($listaRegistroVeiculo,$registroVeiculo);
		}

		return $listaRegistroVeiculo;
	}  
    function select_Valor_RegistroVeiculo($conexao,$codigo){
        $query = "SELECT * 
        FROM VREGISTROVEICULO 
       WHERE CODIGO = '{$codigo}'";

$resultado = mysqli_query($conexao, $query);
return mysqli_fetch_assoc($resultado);	}  

function update_Valores($conexao,$codigo,$valorLiquido,$valorDesconto,$valorPago,$valorTotal,$valorTroco){

$query = "UPDATE REGISTROVEICULO 
SET VALORTOTAL = '{$valorTotal}',
    VALORDESCONTO = '{$valorDesconto}',
    VALORLIQUIDO = '{$valorLiquido}',
    VALORPAGO = '{$valorPago}',
    VALORTROCO = '{$valorTroco}'
WHERE IDRV = '{$codigo}'";

return mysqli_query($conexao,$query);
}

?>