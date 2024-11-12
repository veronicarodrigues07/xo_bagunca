<?php
// Incluir conexão com o banco
include 'conexao.php';

// Verificar se os dados foram enviados corretamente
if (isset($_POST['nome_grupo']) && isset($_POST['descricao_grupo']) && isset($_FILES['foto_grupo'])) {
    $nomeGrupo = $_POST['nome_grupo'];
    $descricaoGrupo = $_POST['descricao_grupo'];
    $codigoEntrada = uniqid();  // Gera um código único para o grupo

    // Upload da foto do grupo
    $fotoNome = $_FILES['foto_grupo']['name'];
    $fotoTemp = $_FILES['foto_grupo']['tmp_name'];
    $destinoFoto = __DIR__ . "/../uploads/" . $fotoNome; // Caminho absoluto para a pasta de uploads

    if (move_uploaded_file($fotoTemp, $destinoFoto)) {
        // Inserir grupo na tabela
        $sql = "INSERT INTO home (nome_home, descricao_home, foto_home, criado_em, codigo_entrada) 
                VALUES (?, ?, ?, NOW(), ?)";
        $stmt = $conn->prepare($sql);

        // Verificar se a preparação foi bem-sucedida
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $stmt->bind_param('ssss', $nomeGrupo, $descricaoGrupo, $fotoNome, $codigoEntrada);

        // Executar a consulta e verificar o resultado
        if ($stmt->execute()) {
            echo "Grupo criado com sucesso!";
        } else {
            echo "Erro ao criar grupo: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao fazer upload da foto.";
    }
} else {
    echo "Preencha todos os campos obrigatórios.";
}

$conn->close();
?>
