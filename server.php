<?php

$todoJson = file_get_contents("data.json");

if(isset($_POST["id"])){
    $list = json_decode($todoJson,true);
    $newtask = [
        'id' => $_POST['id'],
        'text'=> $_POST['text'],
        'done'=> !(bool)$_POST['done']
    ];
    $list[] = $newtask;
    $todoJson = json_encode($list, JSON_PRETTY_PRINT);
    file_put_contents('js/data.json', $todoJson);
}
$_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");
echo $todoJson;