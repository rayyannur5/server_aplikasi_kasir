<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_POST['pegawai_id']);
$store_id = htmlspecialchars($_POST['store_id']);
$shift = htmlspecialchars($_POST['shift']);
$lat_in = htmlspecialchars($_POST['lat_in']);
$lon_in = htmlspecialchars($_POST['lon_in']);
$range_in = htmlspecialchars($_POST['range_in']);

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$time = date('H:i:s');

$destination_path = getcwd().DIRECTORY_SEPARATOR;
$target_path = $destination_path . 'photos/' . basename( $_FILES["image_in"]["name"]);
$namaSementara = $_FILES['image_in']['tmp_name'];

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $target_path);

if (!$terupload) {
    $result = [
        'success' => false,
        'errors' => 'file not uploaded',
    ];
    echo json_encode($result);
    exit();
} 

// GET LOCATION
$json = file_get_contents("https://api.geoapify.com/v1/geocode/reverse?lat=$lat_in&lon=$lon_in&lang=id&format=json&apiKey=$api_key");
$lokasi = json_decode($json, true);
$addr_in = $lokasi['results'][0]['formatted'];
$image_in = "https://fit-vaguely-sloth.ngrok-free.app/server_aplikasi_kasir/pegawai/attendances/photos/" . basename( $_FILES["image_in"]["name"]);


// GET SHIFTS

$shifts = queryArray("SELECT * FROM shifts WHERE store_id = $store_id");
if($shift == 1){
    if($time <= $shifts[0]['time_s1']){
        $status = 1;
    } else {
        $status = 0;
    }
} else if ($shift == 2) {
    if($time <= $shifts[0]['time_s2']){
        $status = 1;
    } else {
        $status = 0;
    }
} else if ($shift == 3) {
    if($time <= $shifts[0]['time_s3']){
        $status = 1;
    } else {
        $status = 0;
    }
}

$result_attendances = queryBoolean("INSERT INTO attendances VALUES(NULL, $pegawai_id, $store_id, $shift, $status, '$image_in', 'image-default-out.png', $lat_in, 0, $lon_in, 0, '$addr_in', '', $range_in, 0, 1, '$created_at', '$updated_at')");
$result_update_pegawai = queryBoolean("UPDATE pegawais SET status_attendance = 1, shift_active = $shift, store_active_id = $store_id, updated_at = '$updated_at' WHERE id = $pegawai_id");

if($result_attendances) {
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
