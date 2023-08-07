<?php

function api(){

    $url = "http://dadosabertos.almg.gov.br/ws/deputados?formato=json";
    $list = json_decode(file_get_contents($url));

    foreach($list-> list as $postar) {
        print_r("<br>id:$postar->id");
        print_r("<br>nome:$postar->nome");
        print_r("<br>partido:$postar->partido");

        $servername = "localhost";
        $username = "root";
        $password = "";
        $bancodedados = "deputados";

    $mysqli = new mysqli($servername, $username,$password,$bancodedados);

    if ($mysqli->connect_error){
        die("Erro na conexão: " . $mysqli->connect_error);
    }
}
}



$resultado = api();
return $resultado;
?>
