<?php
//lay id can del
$id = $_GET['sid'];
// ket noi db
include '../connectdb.php';
//xoa
$delete = "DELETE FROM inventory WHERE id_product = '$id' ";
$result = $conn->query($delete);

mysqli_query($conn, $delete);
echo "<script>alert('Đã xóa!');</script>";
echo "<script>window.location.href = 'index.php';</script>";
exit();