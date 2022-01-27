<?php

    // Select Modelo
	function select_Modelo($conexao){
	    
        $listaModelo = array();

		$query = "SELECT * FROM MODELOVEICULO";

		$resultado = mysqli_query($conexao,$query);
		
        while($modelo = mysqli_fetch_assoc($resultado))
        {
            array_push($listaModelo,$modelo);
		}

		return $listaModelo;
	}
    
    
    // Select Tipo
	function select_Tipo($conexao){
	    
        $listaTipo = array();

		$query = "SELECT * FROM TIPOVEICULO";

		$resultado = mysqli_query($conexao,$query);
		
        while($tipo = mysqli_fetch_assoc($resultado))
        {
            array_push($listaTipo,$tipo);
		}

		return $listaTipo;
	}    

    // Select Porte
	function select_Porte($conexao){
	    
        $listaPorte = array();

		$query = "SELECT * FROM PORTEVEICULO";

		$resultado = mysqli_query($conexao,$query);
		
        while($porte = mysqli_fetch_assoc($resultado))
        {
            array_push($listaPorte,$porte);
		}

		return $listaPorte;
	}  

    // Insert Entrada 
    function insert_Entrada($conexao,
                            $datahora1,
                            $nomecliente,
                            $telefonecliente,
                            $placaveiculo,
                            $modeloveiculo,
                            $tipoveiculo,$porteveiculo){

        $query = "INSERT INTO REGISTROVEICULO (DATAHORA1,DATAHORA2,TIPOVEICULO,PORTEVEICULO,MODELOVEICULO,
                                               PLACAVEICULO,NOMECLIENTE,TELEFONECLIENTE,VALORTOTAL,VALORDESCONTO,
                                               VALORLIQUIDO,VALORPAGO,VALORTROCO)
                   VALUES (now(),null,'{$tipoveiculo}','{$porteveiculo}','{$modeloveiculo}',
                           '{$placaveiculo}','{$nomecliente}','{$telefonecliente}',null,null,null,null,null)";

        return mysqli_query($conexao,$query);
    }   
    
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

    // Delete Entrada
	function delete_Entrada($conexao,$codigo){
		
        $query = "DELETE 
		            FROM REGISTROVEICULO 
		           WHERE IDRV = '{$codigo}'
		           AND DATAHORA2 IS NULL";
		           
		mysqli_query($conexao,$query);		
		
        return mysqli_query($conexao,$query);
	} 

    // Select Update Entrada
	function select_update_Entrada($conexao,$codigo){	
		$query = "SELECT * 
		            FROM REGISTROVEICULO 
		           WHERE IDRV = '{$codigo}'";
		
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

    // Update Entrada 
	function update_Entrada($conexao,
                            $codigo,
                            $nomeCliente,
                            $telefoneCliente,
                            $placaveiculo,
                            $modeloveiculo,
                            $tipoveiculo,
                            $porteveiculo){

		$query = "UPDATE REGISTROVEICULO 
                     SET NOMECLIENTE = '{$nomeCliente}',
                     TELEFONECLIENTE = '{$telefoneCliente}',
                        PLACAVEICULO = '{$placaveiculo}',
                       MODELOVEICULO = '{$modeloveiculo}',
                         TIPOVEICULO = '{$tipoveiculo}',
                        PORTEVEICULO = '{$porteveiculo}'
		        WHERE IDRV = '{$codigo}'";
                
	    return mysqli_query($conexao,$query);
    }

?>