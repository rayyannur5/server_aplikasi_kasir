<?php

date_default_timezone_set("Asia/Jakarta");
header('Content-Type: application/json');

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'aplikasi_kasir';
$api_key = "a773865cb9ad49e0adfb4bd1a0b9d76b";

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

?>