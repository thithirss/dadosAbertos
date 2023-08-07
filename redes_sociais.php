<?php
$api_url = "https://dadosabertos.almg.gov.br/ws/midias/pesquisa?formato=json";
$data = json_decode(file_get_contents($api_url), true);

$contador_redes_sociais = array();

foreach ($data as $entry) {
    foreach ($entry['redes_sociais'] as $rede) {
        $contador_redes_sociais[$rede] = ($contador_redes_sociais[$rede] ?? 0) + 1;
    }
}

arsort($contador_redes_sociais);

echo "Ranking das redes sociais mais utilizadas:<br>";
foreach ($contador_redes_sociais as $rede => $contador) {
    echo "$rede: $contador deputados<br>";
}
?>
