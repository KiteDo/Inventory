<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí hàng hóa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

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
            <div class="item">
                <a href="../login/login.html">
                    <i class="fa-solid fa-money-bill"></i>Đăng xuất
                </a>
            </div>
        </div>
    </div>

    <!-- Main part -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fa-solid fa-border-all"></i>
            </div>
            <!--Nguoi Dung-->
            <div class="user">
                <img src="user.png" alt="">
            </div>
        </div>
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="number">1.054</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

        </div>


        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="number"></div>
                    <a href="chart.php" class="cardName">Biểu đồ</a>
                </div>
                <div class="iconBx">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </div>
            </div>
        </div>
        
        <!--details-->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Hàng Hóa</h2>
                </div>
                <table>
                    <a href="add_invent.html">Thêm sản phẩm mới </a>
                    <tr>
                        <thead >
                        <th>Mã Hàng</th>
                        <th>Tên Hàng</th>
                        <th>Đơn Vị</th>
                        <th>Giá</th>
                        <th>Công Ty</th>
                        </thead>
                    </tr>
                    <?php
                    include '../connectdb.php';
                    $sql = "SELECT * FROM inventory "; // Thay ten_bang bằng tên bảng bạn muốn hiển thị
                
                    $result = mysqli_query($conn, $sql);
                
                    // Kiểm tra và hiển thị dữ liệu
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_product'];?></td>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['unit'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['company'];?></td>
                            <td><a onclick="return confirm('bạn chắc chứ?')" href = "delete.php?sid=<?php echo $row['id_product'];?>">Xóa</a></td>
                        </tr>
                    <?php
                    } 
                    ?>
                </table>
            </div>
        </div>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript"> 
        new Morris.Line(
            {
                // ID of the element in which to draw the chart.
                element: 'chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { year: '2008', value: 20 },
                    { year: '2009', value: 10 },
                    { year: '2010', value: 5 },
                    { year: '2011', value: 5 },
                    { year: '2012', value: 20 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });
    </script>
    <style>
                /* Định dạng bảng */
                table {
                    width: 100%; /* Chiều rộng của bảng */
                    border-collapse: collapse; /* Gộp các đường viền của ô */
                }
                th, td {
                    border: 1px solid black; /* Đường viền của ô */
                    padding: 8px; /* Khoảng cách nội dung từ đường viền */
                }
                /* Thiết lập thanh cuộn bên phải */
                .table-container {
                    max-height: 300px; /* Chiều cao tối đa của bảng */
                    overflow-y: auto; /* Tạo thanh cuộn khi nội dung vượt quá kích thước */
                }
    </style>
</body>
</html>