<?php
$serverName = "localhost"; // Địa chỉ máy chủ
$username = "root"; // Tên người dùng
$password = ""; 
$database = "your_database_name"; // Tên cơ sở dữ liệu

// Kết nối đến MySQL
$conn = new mysqli($serverName, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM tin_tuc"; // Thay 'news' bằng tên bảng của bạn
$result = $conn->query($sql);

$news = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
} else {
    echo "0 kết quả";
}

$conn->close();
echo json_encode($news);
?>