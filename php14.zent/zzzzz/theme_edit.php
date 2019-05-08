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
    <title>Edit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">ZENT GROUP - PHP - MYSQL</h3>
    <h3 align="center">CẬP NHẬT THÔNG TIN SẢN PHẨM</h3>
    <hr>
        <form action="edit.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã Sản Phẩm</label> 
                <input type="text" class="form-control" value="<?= $row['MA_SP'] ?>" id="" placeholder="Mã Sản Phẩm" name="MA_SP" readonly>
            </div>
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" value="<?= $row['TEN_SP'] ?>" id="" placeholder="Nhập vào tên Sản Phẩm" name="TEN_SP">
            </div>  
            <div class="form-group">
                <label for="">Số Lượng</label>
                <input type="text" class="form-control" value="<?= $row['SO_LUONG']?>" id="" placeholder="Nhập vào số lượng" name="SO_LUONG">
            </div>
            <div class="form-group">
                <label for="">Giá Nhập</label>
                <input type="number" class="form-control" value="<?= $row['GIA_NHAP']?>" id="" placeholder="Nhập vào giá nhập" name="GIA_NHAP">
            </div>
            <div class="form-group">
                <label for="">Giá Bán</label>
                <input type="text" class="form-control" value="<?= $row['GIA_BAN']?>" id="" placeholder="Nhập vào giá bán" name="GIA_BAN">
            </div>
             <!--div class="form-group">
                <label for="">Ảnh Sản phẩm</label>
                <input type="file" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="ANH_SP">
            </div-->
            <button type="submit" class="btn btn-primary">Cập Nhật thông tin</button>
        </form>
    </div>
</body>
</html>