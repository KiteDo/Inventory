<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="side-bar">
        <header>
            <a href="#">
                <span class="title">Quản lý hàng hóa</span>
            </a>
        </header>

        <div class="menu">
            <div class="item"><a href="index.php"><i class="fa-solid fa-house"></i>Trang chủ</a></div>
            <div class="item">
                <a class="sub-btn">
                    <i class="fa-brands fa-dropbox"></i>Quản lý hàng hóa
                    <i class="fas fa-angle-right dropdown"></i>
                </a>
                <div class="sub-menu">
                    <a href="inventory_in.php" class="sub-item">Quản lý nhập</a>
                    <a href="inventory_out.php" class="sub-item">Quản lý xuất</a>
                    <a href="inventory.php" class="sub-item">Quản lý tồn</a>
                </div>
            </div>

            <div class="item">
                <a href="bill.php">
                    <i class="fa-solid fa-money-bill"></i>Quản lý hóa đơn
                </a>
            </div>

            <div class="item">
                <a href="report.php"><i class="fa-solid fa-message"></i>Báo cáo
                </a>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fa-solid fa-border-all"></i>
            </div>
            <div class="user">
                <img src="user.png" alt="">
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Hàng Xuất</h2>
                </div>
                <table>
                <?php
                    include '../connectdb.php';
                    $sql =  "SELECT inventory.id_product, inventory.product_name, inventory_out.quantity, inventory_out.date FROM inventory_out INNER JOIN inventory ON inventory_out.id_product = inventory.id_product";
                    $result = mysqli_query($conn, $sql);
                    // Kiểm tra và hiển thị dữ liệu
                    if (mysqli_num_rows($result) > 0) {
                        echo "<thead align = left >";
                        echo "<tr><th>Mã Sản Phẩm</th><th>Tên Sản Phẩm </th><th>Số Lượng</th><th>Ngày Xuất</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr><td>".$row["id_product"]."</td><td>".$row["product_name"]."</td><td>".$row["quantity"]."</td><td>".$row["date"]."</td></tr>";                            
                    }
                        echo "</thead>";
                    } else {
                        echo "Không có dữ liệu để hiển thị.";
                    }
                    // Đóng kết nối đến MySQL
                    mysqli_close($conn);
                ?>
                </table>
            </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                //jquery for toggle sub menus
                $('.sub-btn').click(function () {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });

            });

        </script>

        <script>
            //MenuToggle
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.side-bar');
            let main = document.querySelector('.main');

            toggle.onclick = function () {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
        </script>
</body>

</html>