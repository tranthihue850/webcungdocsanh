<?php
header('Content-Type: application/json');

// Kết nối SQL Server
$serverName = "localhost"; // Hoặc IP của SQL Server
$connectionOptions = array(
    "Database" => "book_db",
    "Uid" => "your_username",       // <- sửa tên đăng nhập SQL Server
    "PWD" => "your_password",       // <- sửa mật khẩu
    "CharacterSet" => "UTF-8"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    http_response_code(500);
    die(json_encode(["error" => sqlsrv_errors()]));
}

$sql = "SELECT title, content FROM tin_tuc";
$stmt = sqlsrv_query($conn, $sql);

$news = [];

if ($stmt) {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $news[] = [
            "title" => $row['title'],
            "content" => $row['content']
        ];
    }
    echo json_encode($news, JSON_UNESCAPED_UNICODE);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Lỗi truy vấn"]);
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
