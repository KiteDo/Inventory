
<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
{
  // Dữ liệu sản phẩm mới
    $id_product = $_POST['id_product'];
    $product_name =  $_POST['product_name'];
    $unit = $_POST['unit']; 
    $price = $_POST['price']; 
    $company = $_POST['company'];

    include '../connectdb.php';
   // Câu lệnh SQL để thêm sản phẩm mới
    $query = "INSERT INTO inventory (id_product, product_name, unit, price, company ) VALUES ('$id_product', $product_name,  $unit,$price, $company)";
    $result = $conn->query($query);

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
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
