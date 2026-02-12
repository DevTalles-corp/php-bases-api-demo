<?php

declare(strict_types=1);
function validateTask(array $data): array
{
    $errors = [];
    if (empty($data['title'])) {
        $errors[] = "El título es obligatorio";
    }
    if (empty($data['description'])) {
        $errors[] = "La descripción es obligatoria";
    }
    return $errors;
}
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
    $errors = validateTask($data);
    if (count($errors) > 0) {
        http_response_code(422);
        echo json_encode($errors);
        exit;
    }
    http_response_code(201);
    echo json_encode(
        [
            "message" => "Tarea creada satisfactoriamente",
            "title" => $data['title'],
            "description" => $data['description'],
        ]
    );
}
