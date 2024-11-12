<?php
// verificar_email.php
require 'conexao.php'; // Inclua sua conexão com o banco de dados

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $stmt = $pdo->prepare("SELECT nome_usuario, foto_usuario FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode(['existe' => true, 'nome_usuario' => $user['nome_usuario'], 'foto_usuario' => $user['foto_usuario']]);
    } else {
        echo json_encode(['existe' => false]);
    }
}
?>
