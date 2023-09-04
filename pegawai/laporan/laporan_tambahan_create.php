<?php
require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_POST['pegawai_id']);
$report_category_id = htmlspecialchars($_POST['report_category_id']);
$description = htmlspecialchars($_POST['description']);
$lat = htmlspecialchars($_POST['lat']);
$lon = htmlspecialchars($_POST['lon']);
$range = htmlspecialchars($_POST['range']);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$pegawai = queryArray("SELECT * FROM pegawais WHERE id = $pegawai_id")[0];
if ($pegawai == null){
    echo json_encode([
        'success' => false,
        'errors' => 'pegawai id not found',
    ]);
    exit();
}

$shift = $pegawai['shift_active'];

$destination_path = getcwd().DIRECTORY_SEPARATOR;
$target_path = $destination_path . 'photos/' . basename( $_FILES["image"]["name"]);
$namaSementara = $_FILES['image']['tmp_name'];

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

$json = file_get_contents("https://api.geoapify.com/v1/geocode/reverse?lat=$lat&lon=$lon&lang=id&format=json&apiKey=$api_key");
$lokasi = json_decode($json, true);
$addr = $lokasi['results'][0]['formatted'];
$image = "https://fit-vaguely-sloth.ngrok-free.app/server_aplikasi_kasir/pegawai/laporan/photos/" . basename( $_FILES["image"]["name"]);


$result_report = queryBoolean("INSERT INTO reports VALUES(NULL, $pegawai_id, $report_category_id, $shift, '$description', '$image', $lat, $lon, '$addr', $range, 1, '$created_at', '$updated_at')");

if($result_report){
    echo json_encode([
        'success' => true,
        'errors' => null,
    ]);
} else {
    echo json_encode([
        'success' => false,
        'errors' => 'failed to create',
    ]);
}