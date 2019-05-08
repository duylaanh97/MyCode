<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chi Tiết</title>
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body> -->

<?php 

    include("models/Connection.php");  
    include_once('public/Layouts/header.php');
?>
    <div class="container">
        <h3 class="text-center">THÔNG TIN NHÂN VIÊN</h3>
        <ul>
            <li>Mã Nhân Viên: <?= $row['MaNV'] ?></li>
            <li>Tên Nhân Viên: <?= $row['TenNV'] ?></li>
            <li>Năm Sinh: <?= $row['NamSinh'] ?></li>
            <li>Quê Quán: <?= $row['Que'] ?></li>
            <!--<li>Ảnh sản phẩm:</li> 
                <img src="uploads/<?= $row['ANH_SP'] ?>" alt="<?= $row['TEN_SP'] ?>" width="300px" height="auto">
            -->
        </ul>
    </div>
</body>
</html>

<?php include_once('public/Layouts/footer.php'); ?> 