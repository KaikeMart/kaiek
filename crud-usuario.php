<?php

    // Select Usuario
    function select_usuario($conexao,$email,$senha){

        $senhaMd5 = md5($senha);

        $query = "SELECT * 
                    FROM USUARIOSISTEMA
                WHERE EMAIL = '{$email}'
                    AND SENHA = '{$senhaMd5}'";

        $resultado = mysqli_query($conexao,$query);		
        $usuario =  mysqli_fetch_assoc($resultado);

        return $usuario;
    }


?>