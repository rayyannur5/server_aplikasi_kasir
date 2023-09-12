<?php
require_once ('../../init.php');

$start = $_GET['start_date'] . ' 00:00:00';
$end = $_GET['end_date'] . ' 23:59:59';
$store_id = $_GET['store_id'];

$attendances = queryArray("SELECT attendances.*, pegawais.name, pegawais.admin_id FROM attendances 
INNER JOIN pegawais ON pegawais.id = attendances.pegawai_id
WHERE attendances.store_id = $store_id
AND attendances.created_at BETWEEN '$start' AND '$end'");

$data = [];
foreach ($attendances as $key => $attendance) {
    $pegawai_id = $attendance['pegawai_id'];
    $created_at_attendance = $attendance['created_at'];
    $updated_at_attendance = $attendance['created_at'] == $attendance['updated_at'] ? substr($attendance['updated_at'], 0, 10) . ' 23:59:59' : $attendance['updated_at'];
    $transactions = queryArray("SELECT SUM(transactions.paid) as total, stores.name as store FROM transactions 
                                INNER JOIN stores ON stores.id = transactions.store_id 
                                WHERE transactions.pegawai_id = $pegawai_id AND transactions.created_at BETWEEN '$created_at_attendance' AND '$updated_at_attendance'")[0];
    array_push($data, [
        'date' => $created_at_attendance,
        'pegawai' => $attendance['name'],
        'total_kasir' => (int)$transactions['total'],
        'total_device' => 0,
        'store' => $transactions['store'],
        'selisih' => abs($transactions['total'] - 0),
    ]);
}

echo json_encode([
    'success' => true,
    'data' => $data,
    'errors' => null
]);
