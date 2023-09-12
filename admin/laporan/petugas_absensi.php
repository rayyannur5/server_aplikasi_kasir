<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);
$start_date = htmlspecialchars($_GET['start_date']) . ' 00:00:00';
$end_date = htmlspecialchars($_GET['end_date']) . ' 23:59:59';

$result_attendances = queryArray("SELECT attendances.*, pegawais.name as pegawai FROM attendances
INNER JOIN pegawais ON pegawais.id = attendances.pegawai_id
WHERE attendances.created_at BETWEEN '$start_date' AND '$end_date' AND pegawais.admin_id = $admin_id");

foreach ($result_attendances as $key => $attendance) {
    $pegawai_id = $attendance['pegawai_id'];
    $created_at_attendance = $attendance['created_at'];
    $updated_at_attendance = $attendance['created_at'] == $attendance['updated_at'] ? substr($attendance['updated_at'], 0, 10) . ' 23:59:59' : $attendance['updated_at'];
    $transactions = queryArray("SELECT SUM(transactions.paid) as total, stores.name as store FROM transactions 
                                INNER JOIN stores ON stores.id = transactions.store_id 
                                WHERE transactions.pegawai_id = $pegawai_id AND transactions.created_at BETWEEN '$created_at_attendance' AND '$updated_at_attendance'")[0];

    $result_attendances[$key]['omset'] = $transactions['total'];
    $result_attendances[$key]['store'] = $transactions['store'];
}

$result = [
    'success' => true,
    'data' => $result_attendances,
    'errors' => null,
];

echo json_encode($result);