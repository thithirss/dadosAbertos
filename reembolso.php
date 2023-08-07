<?php
$api_url = "http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados?formato=json";
$response = file_get_contents($api_url);
$data = json_decode($response, true);

$mysqli = new mysqli("localhost", "root", "", "deputados");
if ($mysqli->connect_error) die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);

foreach ($data as $entry) {
    $deputado = $mysqli->real_escape_string($entry['nome']);
    $mes = intval($entry['mes']);
    $ano = intval($entry['ano']);
    $valor = floatval($entry['valor']);

    $sql = "INSERT INTO reembolsos (deputado, mes, ano, valor) VALUES ('$deputado', $mes, $ano, $valor)";
    
    if ($mysqli->query($sql) !== true) echo "Erro ao inserir dados: " . $mysqli->error;
    
    echo "Dados do deputado '$deputado' inseridos com sucesso!<br>";
}

$mysqli->close();
?>
