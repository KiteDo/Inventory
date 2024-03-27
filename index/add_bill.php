
<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{
  // Dữ liệu sản phẩm mới
    $id_bill = $_POST['id_bill'];
    $payment = $_POST['payment']; 
    $price = $_POST['price']; 
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    include '../connectdb.php';
   // Câu lệnh SQL để thêm sản phẩm mới
    $query = "INSERT IGNORE INTO bill (id_bill, payment, price, time_in, time_out) VALUES ('$id_bill', '$payment', '$price', '$time_in', '$time_out')";
    $result = $conn->query($query);

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
        echo "<script>window.location.href = 'bill.php';</script>";
        exit();
    }
    else{
        //that bai
        echo "Lỗi: " . mysqli_error($conn);
        header("Location: /add_bill.html");
        exit();
    }

}
?>
