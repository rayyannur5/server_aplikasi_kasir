<?php
require_once ('../../init.php');

$start = $_GET['start_date'] . ' 00:00:00';
$end = $_GET['end_date'] . ' 23:59:59';
$admin_id = $_GET['admin_id'];


$reports = queryArray("SELECT reports.*, report_category.name as category, pegawais.name FROM reports 
INNER JOIN report_category ON reports.report_category_id = report_category.id 
INNER JOIN pegawais ON pegawais.id = reports.pegawai_id
WHERE pegawais.admin_id = $admin_id
AND reports.created_at BETWEEN '$start' AND '$end'");

echo json_encode([
    'success' => true,
    'data' => $reports,
    'errors' => null,
]);