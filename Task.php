<?php

declare(strict_types=1);
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
if ($method === "GET") {
    $tasks = [
        ["id" => 1, "title" => "Aprender PHP", "completed" => true],
        ["id" => 2, "title" => "Aprender Laravel", "completed" => false]
    ];
    echo json_encode($tasks);
    exit;
} else if ($method === "POST") {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);
    $taskTitle = $data['title'] ?? null;
    if ($taskTitle === null) {
        http_response_code(400);
        echo json_encode(["error" => "El título es requerido"]);
        exit;
    }
    http_response_code(201);
    echo json_encode(
        [
            "message" => "Tarea creada satisfactoriamente",
            "title" => $taskTitle
        ]
    );
}
