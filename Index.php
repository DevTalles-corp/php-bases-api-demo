<?php

declare(strict_types=1);

$method = $_SERVER["REQUEST_METHOD"];
echo "Método HTTP recibido: $method\n";
http_response_code(200); // OK
echo "Servidor activo y funcionando\n";
