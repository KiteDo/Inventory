<?php
//lay id can del
$id = $_GET['sid'];
// ket noi db
include '../connectdb.php';
//xoa
$delete = "DELETE FROM inventory_remain WHERE id = '$id' ";
$result = $conn->query($delete);

mysqli_query($conn, $delete);
echo "<script>alert('Đã xóa!');</script>";
echo "<script>window.location.href = 'inventory.php';</script>";
exit();