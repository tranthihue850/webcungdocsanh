<?php
$serverName = "localhost"; // hoặc địa chỉ IP của SQL Server
$connectionOptions = array(
    "Database" => "book_db",
    "Uid" => "username", // Thay bằng username của bạn
    "PWD" => "password"   // Thay bằng password của bạn
);

// Kết nối đến SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>