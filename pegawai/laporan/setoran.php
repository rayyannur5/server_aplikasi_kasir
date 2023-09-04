<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);
$start_date = htmlspecialchars($_GET['start_date']) . ' 00:00:00';
$end_date = htmlspecialchars($_GET['end_date']) . ' 23:59:59';

$setorans = queryArray("SELECT * FROM setorans WHERE pegawai_id = $pegawai_id AND created_at BETWEEN '$start_date' AND '$end_date'");

$result = [
    'success' => true,
    'data' => $setorans,
    'errors' => null,
];

echo json_encode($result);