<?php
require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);

$reports = queryArray("SELECT reports.*, report_category.name FROM reports INNER JOIN report_category ON reports.report_category_id = report_category.id WHERE pegawai_id = $pegawai_id");

echo json_encode([
    'success' => true,
    'data' => $reports,
    'errors' => null,
]);