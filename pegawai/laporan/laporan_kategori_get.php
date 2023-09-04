<?php

require_once ('../../init.php');

$category = queryArray("SELECT * FROM report_category");

$result = [
    'success' => true,
    'data' => $category,
    'errors' => null,
];

echo json_encode($result);