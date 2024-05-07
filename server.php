<?php

$todoJson = file_get_contents("js/data.json");

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'GET') {
    if ($method === 'POST') {
        $list = json_decode($todoJson, true);
        if (isset($_POST["id"])) {
            $newtask = [
                'id' => (int)$_POST['id'],
                'text' => $_POST['text'],
                'done' => !(bool) $_POST['done']
            ];
            $list[] = $newtask;
        }
    }
    $todoJson = json_encode($list, JSON_PRETTY_PRINT);
    file_put_contents('js/data.json', $todoJson);
} elseif ($method === 'DELETE') {
    $list = json_decode($todoJson, true);
    $obj = json_decode(file_get_contents('php://input'), true);
    array_splice($list, $obj['id'], 1);
    $todoJson = json_encode($list, JSON_PRETTY_PRINT);
    file_put_contents('js/data.json', $todoJson);
}

header("Content-Type: application/json");
echo $todoJson;