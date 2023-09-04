<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_POST['pegawai_id']);
$lat_out = htmlspecialchars($_POST['lat_out']);
$lon_out = htmlspecialchars($_POST['lon_out']);
$range_out = htmlspecialchars($_POST['range_out']);

$updated_at = date('Y-m-d H:i:s');

$destination_path = getcwd().DIRECTORY_SEPARATOR;
$target_path = $destination_path . 'photos/' . basename( $_FILES["image_out"]["name"]);
$namaSementara = $_FILES['image_out']['tmp_name'];

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $target_path);

if (!$terupload) {
    $result = [
        'success' => false,
        'errors' => 'file not uploaded',
    ];
    echo $result;
    exit();
} 

// GET LOCATION
$json = file_get_contents("https://api.geoapify.com/v1/geocode/reverse?lat=$lat_out&lon=$lon_out&lang=id&format=json&apiKey=$api_key");
$lokasi = json_decode($json, true);
$addr_out = $lokasi['results'][0]['formatted'];
$image_out = "https://fit-vaguely-sloth.ngrok-free.app/server_aplikasi_kasir/pegawai/attendances/photos/" . basename( $_FILES["image_out"]["name"]);

$start_date = date('Y-m-d') . ' 00.00.00';
$end_date = date('Y-m-d') . ' 23.59.59';
$get_attendences_today = queryArray("SELECT * FROM attendances WHERE created_at BETWEEN '$start_date' AND '$end_date' AND pegawai_id = $pegawai_id AND active = 1");

if(empty($get_attendences_today)) {
    $result = [
        'success' => false,
        'errors' => 'not presence yet today',
    ];
    echo $result;
    exit();
}

$attendance_id = $get_attendences_today[0]['id'];
$result_update_attendances = queryBoolean("UPDATE attendances SET image_out = '$image_out', lat_out = $lat_out, lon_out = $lon_out, addr_out = '$addr_out', range_out = $range_out, updated_at = '$updated_at' WHERE id = $attendance_id");
$result_update_pegawai = queryBoolean("UPDATE pegawais SET status_attendance = 2, shift_active = 0, store_active_id = 0, updated_at = '$updated_at' WHERE id = $pegawai_id");

if($result_update_attendances) {
    $result = [
        'success' => true,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'errors' => 'create attendance failed',
    ];
}

echo json_encode($result);