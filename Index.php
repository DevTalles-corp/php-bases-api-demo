<?php

declare(strict_types=1);

// $method = $_SERVER["REQUEST_METHOD"];
// echo "Método HTTP recibido: $method\n";
// http_response_code(200); // OK
// echo "Servidor activo y funcionando\n";

header("Content-Type: application/json");
$response =
    [
        "status" => "success",
        "message" => "API funcionando correctamente"
    ];
echo json_encode($response);

$input = file_get_contents("test.json");
$data = json_decode($input, true);

echo json_encode($data);
