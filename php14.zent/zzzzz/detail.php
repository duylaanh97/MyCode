<?php 
	$ma = $_GET['msp'];

	include_once('connect.php');
    // Cau lenh truy van co so du lieu
    $query = "SELECT * FROM san_pham WHERE MA_SP = '".$ma."' " ;

    // Thuc thi cau lenh truy van co so du lieu
    $result = $conn->query($query);

    $row = $result->fetch_assoc();

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chi Tiết</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h3 class="text-center">THÔNG TIN SẢN PHẨM</h3>
        <ul>
            <li>Mã Sản Phẩm: <?= $row['MA_SP'] ?></li>
            <li>Tên Sản Phẩm: <?= $row['TEN_SP'] ?></li>
            <li>Số Lượng: <?= $row['SO_LUONG'] ?></li>
            <li>Giá Nhập: <?= $row['GIA_NHAP'] ?></li>
            <li>Giá Bán: <?= $row['GIA_BAN'] ?></li>
            <!--<li>Ảnh sản phẩm:</li> 
                <img src="uploads/<?= $row['ANH_SP'] ?>" alt="<?= $row['TEN_SP'] ?>" width="300px" height="auto">
            -->
        </ul>
    </div>
</body>
</html>