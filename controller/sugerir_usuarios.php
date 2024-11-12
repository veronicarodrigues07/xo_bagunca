<?php
include 'conexao.php';

if ($mysqli->connect_error) {
    die('Erro na conexão: ' . $mysqli->connect_error);
}

// Obtendo o termo de pesquisa da query string
$query = $_GET['query'] ?? '';

// Consulta de emails que correspondem ao termo digitado
$sql = "SELECT email FROM usuarios WHERE email LIKE ? LIMIT 10";
$stmt = $mysqli->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param('s', $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$emails = [];
while ($row = $result->fetch_assoc()) {
    $emails[] = $row;
}

// Retornando os resultados em formato JSON
header('Content-Type: application/json');
echo json_encode($emails);
?>
