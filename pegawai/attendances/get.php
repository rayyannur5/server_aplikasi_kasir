<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);
$start_date = htmlspecialchars($_GET['start_date']) . ' 00:00:00';
$end_date = htmlspecialchars($_GET['end_date']) . ' 23:59:59';

$result_attendances = queryArray("SELECT * FROM attendances WHERE created_at BETWEEN '$start_date' AND '$end_date' AND pegawai_id = $pegawai_id");

$result = [
    'success' => true,
    'data' => $result_attendances,
    'errors' => null,
];

echo json_encode($result);