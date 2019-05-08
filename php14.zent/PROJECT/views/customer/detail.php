<?php 

    include("models/Connection.php");  
    include_once('public/Layouts/header.php');
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
        <h3 class="text-center">THÔNG TIN KHÁCH HÀNG</h3>
        <ul>
            <li>Mã Khách Hàng: <?= $row['MaKH'] ?></li>
            <li>Tên Khách Hàng: <?= $row['TenKH'] ?></li>
            <li>Địa Chỉ: <?= $row['DiaChi'] ?></li>
            <li>Số Điện Thoại: <?= $row['Phone'] ?></li>
            <li>Mô Tả: <?= $row['MoTa'] ?></li>
            <!--<li>Ảnh sản phẩm:</li> 
                <img src="uploads/<?= $row['ANH_SP'] ?>" alt="<?= $row['TEN_SP'] ?>" width="300px" height="auto">
            -->
        </ul>
    </div>
</body>
</html>

<?php include_once('public/Layouts/footer.php'); ?>