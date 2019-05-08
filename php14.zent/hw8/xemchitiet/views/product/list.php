<?php 
	/*$ma = $_GET['mnv'];

	include_once('connection.php');
    // Cau lenh truy van co so du lieu
    $query = "SELECT * FROM nhan_vien WHERE MaNV = '".$ma."' " ;

    //Thuc thi cau lenh truy van co so du lieu
    $result = $conn->query($query);

    $row = $result->fetch_assoc();*/

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
        <h3 class="text-center">THÔNG TIN NHÂN VIÊN</h3>
        <?php foreach ($data as $row) {  ?>
        <ul>
            <li>Mã Nhân Viên: <?= $row['MaNV'] ?></li>
            <li>Tên Nhân Viên: <?= $row['TenNV'] ?></li>
            <li>Năm Sinh: <?= $row['NamSinh'] ?></li>
            <li>Quê Quán: <?= $row['Que'] ?></li>
            <!--<li>Ảnh sản phẩm:</li> 
                <img src="uploads/<?= $row['ANH_SP'] ?>" alt="<?= $row['TEN_SP'] ?>" width="300px" height="auto">
            -->
        <?php } ?>
        </ul>
    </div>
</body>
</html>