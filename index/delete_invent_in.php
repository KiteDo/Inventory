<?php
//lay id can del
$id = $_GET['sid'];
// ket noi db
include '../connectdb.php';
//xoa
$delete = "DELETE FROM inventory_in WHERE id = '$id' ";
$result = $conn->query($delete);

mysqli_query($conn, $delete);
echo "<script>alert('Đã xóa!');</script>";
echo "<script>window.location.href = 'inventory_in.php';</script>";
exit();