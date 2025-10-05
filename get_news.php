<?php
include 'connect.php';

$sql = "SELECT * FROM sach";
$stmt = sqlsrv_query($conn, $sql);

$books = array();
if ($stmt) {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $books[] = $row;
    }
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

echo json_encode($books);
?>