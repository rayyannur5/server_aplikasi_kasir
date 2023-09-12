<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_POST['admin_id']);
$name = htmlspecialchars($_POST['name']);

$result = queryBoolean("UPDATE admins SET `name` = '$name' WHERE id = $admin_id");
if($result){
    echo json_encode([
        'success' => true,
        'errors' => null,
    ]);
} else {
    echo json_encode([
        'success' => false,
        'errors' => null,
    ]);
}