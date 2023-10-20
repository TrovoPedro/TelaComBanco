<?php
    require '../conexao.php';
    $conexao = conectar();
    require '../class/Consulta.php';
    
    $sql = "SELECT * FROM tbl_consulta";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");
 
   $listaPacientes = [];
    // Apresentar os registros
    while ($registro = mysqli_fetch_array($res)) {
        $numConsulta = $registro['numConsulta'];
        $dataConsulta = $registro['dataConsulta'];
        $horaConsulta = $registro['horaConsulta'];
        
        $p = new Consulta($numConsulta, $dataConsulta, $horaConsulta);
        
        // no final, terei uma lista com 5 pacientes                                    
        array_push($listaPacientes, $p);
 
    }

    $lista_json = json_encode($listaPacientes);
 
    fecharConexao($conexao);
 
    echo $lista_json;
?>