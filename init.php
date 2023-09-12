<?php

date_default_timezone_set("Asia/Jakarta");
header('Content-Type: application/json');

$db_host = 'localhost';
$db_user = 'u431884832_rayyan';
$db_pass = 'Rayyan@123';
$db_name = 'u431884832_new';
$api_key = "a773865cb9ad49e0adfb4bd1a0b9d76b";

// $driver = new mysqli_driver();
// $driver->report_mode = MYSQLI_REPORT_OFF;

try {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
    echo $th;
    exit();
}

function queryArray($query) : array {
    global $conn;
    try {
        $r = mysqli_query($conn, $query);
    } catch (\Throwable $th) {
        $result = [
            'success' => false,
            'data' => [],
            'errors' => $th->getMessage(),
        ];
        echo json_encode($result);
        exit();
    }
    $rows = [];
	while( $row = mysqli_fetch_assoc($r) ) {
		$rows[] = $row;
	}
    return $rows;
}

function queryBoolean($query) {
    global $conn;
    try {
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } catch (\Throwable $th) {
        $result = [
            'success' => false,
            'data' => [],
            'errors' => $th->getMessage(),
        ];
        echo json_encode($result);
        exit();
    }
}
function MultiQueryBoolean($query) {
    global $conn;
    try {
        mysqli_multi_query($conn, $query);
        return mysqli_affected_rows($conn);
    } catch (\Throwable $th) {
        $result = [
            'success' => false,
            'data' => [],
            'errors' => $th->getMessage(),
        ];
        echo json_encode($result);
        exit();
    }
}


// try {
//     mysqli_query($conn, "CREATE TABLE de `$device_id`");
// } catch (\Throwable $th) {
//     //throw $th;
//     echo $th;
// }

?>