
<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{
  // Dữ liệu sản phẩm mới
    $id_product = $_POST['id_product'];
    $quantity = $_POST['quantity']; // Số lượng 
    $price = $_POST['price']; // Giá sản phẩm
    $date = $_POST['date'];

    include '../connectdb.php';
   // Câu lệnh SQL để thêm sản phẩm mới
    $query = "INSERT INTO inventory_in (id_product, quantity, price, date) VALUES ($id_product, $quantity, $price, $date)";
    $result = $conn->query($query);

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
        echo "<script>window.location.href = 'inventory_in.php';</script>";
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
