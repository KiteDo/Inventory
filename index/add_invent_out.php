
<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{
  // Dữ liệu sản phẩm mới
    $id_product = $_POST['id_product'];
    $quantity = $_POST['quantity']; // Số lượng 
    $date = $_POST['date'];

    include '../connectdb.php';
   // Câu lệnh SQL để thêm sản phẩm mới
    $query = "INSERT IGNORE INTO inventory_out (id_product, quantity, date) VALUES ('$id_product', '$quantity', '$date')";
    $result = $conn->query($query);

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
        echo "<script>window.location.href = 'inventory_out.php';</script>";
        exit();
    }
    else{
        //that bai
        echo "Lỗi: " . mysqli_error($conn);
        header("Location: /add_invent_out.php");
        exit();
    }

}
?>
