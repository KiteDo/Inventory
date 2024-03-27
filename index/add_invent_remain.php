
<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{
  // Dữ liệu sản phẩm mới
    $id_product = $_POST['id_product'];
    $quantity = $_POST['quantity']; 
    $date_in = $_POST['date_in']; 
    $date_check = $_POST['date_check'];

    include '../connectdb.php';
   // Câu lệnh SQL để thêm sản phẩm mới
    $query = "INSERT IGNORE INTO inventory_remain (id_product, quantity, date_in, date_check) VALUES ('$id_product', '$quantity', '$date_in', '$date_check')";
    $result = $conn->query($query);

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
        echo "<script>window.location.href = 'inventory.php';</script>";
        exit();
    }
    else{
        //that bai
        echo "Lỗi: " . mysqli_error($conn);
        header("Location: /add_invent_in.php");
        exit();
    }

}
?>
