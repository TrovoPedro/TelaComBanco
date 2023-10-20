<?php
    require '../conexao.php';
    $conexao = conectar();
    require '../class/Paciente.php';
    
    $sql = "SELECT * FROM tbl_paciente";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");
 
   $listaPacientes = [];
    // Apresentar os registros
    while ($registro = mysqli_fetch_array($res)) {
        $nome = $registro['nomePaciente'];
        $endereco = $registro['enderecoPaciente'];
        $telefone = $registro['telPaciente'];
        $numeroBeneficiario = $registro['numBeneficiario'];
        $doencasPrevias = $registro['doencaPrev'];
        $remedioUsoContinuo = $registro['remDeUsoCont'];
        
        $p = new Paciente($numeroBeneficiario, $nome, $endereco, 
                    $telefone, $doencasPrevias, $remedioUsoContinuo);
        
        // no final, terei uma lista com 5 pacientes                                    
        array_push($listaPacientes, $p);
 
    }
 
    $lista_json = json_encode($listaPacientes);
 
    fecharConexao($conexao);
 
    echo $lista_json;
?>