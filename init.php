<?php

date_default_timezone_set("Asia/Jakarta");
header('Content-Type: application/json');

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'aplikasi_kasir';

try {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
    throw $th;
}

function queryArray($query) : array {
    global $conn;
    try {
        $r = mysqli_query($conn, $query);
    } catch (\Throwable $th) {
        echo "<h1>QUERY ERROR</h1>";
        throw $th;
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
        $r = mysqli_query($conn, $query);
        return $r;
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

?>