<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh số theo ngày</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
<div class="tit"><H1>DOANH SỐ THEO NGÀY</H1></div>
    
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
    <!-- chart draw-->
        <div class = "chart" id="chart" style="height: 800px; width: 700px;"></div>
        <?php 
            
            include '../connectdb.php';
            $sql = "SELECT DATE_FORMAT(time_out, '%Y-%m-%d') AS sale_day, SUM(price) AS total
            FROM bill
            GROUP BY sale_day";
            $result = $conn->query($sql);
    
            // Chuyển đổi dữ liệu thành định dạng JSON
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array("date" => $row["sale_day"], "price" => $row["total"]);
            }
            
            // Đóng kết nối
            $conn->close();
            
            // Chuyển đổi thành JSON
            $json_data = json_encode($data);
        ?>
        <style>.chart
        {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        } 
        .tit h1{
            position: absolute; 
            top: 5%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            text-align: center; 
        }
        </style>
        


   





      <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
      
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        
    <script type="text/javascript"> 
        var jsonData = <?php echo $json_data; ?>;
        new Morris.Bar(
            {
                // ID of the element in which to draw the chart.
                element: 'chart',
                // Chart data records -- each entry in this array corresponds to a point on                    // the chart.
                data: jsonData,
                // The name of the data record attribute that contains x-values.
                xkey: 'date',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['price'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['price'],
                hideHover:'auto',
                parseTime: false, // Không phân tích dữ liệu thời gian (đã được chuyển đổi thành ngày)
                title: 'DOANH SỐ THE NGÀY', // Đặt tên cho biểu đồ
                barColors: ['#3C8DBC'], // Màu của cột trong biểu đồ
                resize: true, // Tự động điều chỉnh kích thước biểu đồ khi cửa sổ trình duyệt thay đổi kích thước
            });
    </script>
</body>
</html>