<?php
    require '../conexao.php';
    $conexao = conectar();
    require '../class/Especialidade.php';
    
    $sql = "SELECT * FROM tbl_paciente";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");
 
   $listaPacientes = [];
    // Apresentar os registros
    while ($registro = mysqli_fetch_array($res)) {
        $nomeEspecialidade = $registro['nomeEspecialidade'];
        $numRegistro = $registro['numRegistro'];
        $publicoAlvo = $registro['publicoAlvo'];
    
        
        $p = new Especialidade($nomeEspecialidade, $numRegistro, $publicoAlvo);
        
        // no final, terei uma lista com 5 pacientes                                    
        array_push($listaPacientes, $p);
 
    }
 
    $lista_json = json_encode($listaPacientes);
 
    fecharConexao($conexao);
 
    echo $lista_json;
?>