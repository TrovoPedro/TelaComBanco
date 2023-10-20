<?php
    require '../conexao.php';
    $conexao = conectar();
    require '../class/Agendamento.php';
    
    $sql = "SELECT * FROM tbl_agendamento";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");
 
   $listaPacientes = [];
    // Apresentar os registros
    while ($registro = mysqli_fetch_array($res)) {
        $numAgendamento = $registro['numAgendamento'];
        $dataAgend = $registro['dataAgend'];
        $horaAgend = $registro['horaAgend'];
        $queixaAgend = $registro['queixaAgend'];
        $gravidadeAgend = $registro['gravidadeAgend'];
        
        $p = new Agendamento($numAgendamento, $dataAgend, $horaAgend, 
                    $queixaAgend, $gravidadeAgend);
        
        // no final, terei uma lista com 5 pacientes                                    
        array_push($listaPacientes, $p);
 
    }
 
    $lista_json = json_encode($listaPacientes);
 
    fecharConexao($conexao);
 
    echo $lista_json;
?>