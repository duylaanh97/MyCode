<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    
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
    <h3 align="center">ZENT GROUP - PHP - MYSQL</h3>
    <h3 align="center">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h3>
    <hr>
        <form action="?mod=customer&act=update" method="POST" role="form" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="">Mã Khách Hàng</label> 
                <input type="text" class="form-control" value="<?= $row['MaKH'] ?>" id="" placeholder="Mã Khách Hàng" name="MaKH" readonly>
            </div>
            <div class="form-group">
                <label for="">Tên Khách Hàng</label>
                <input type="text" class="form-control" value="<?= $row['TenKH'] ?>" id="" placeholder="Nhập vào tên khách hàng" name="TenKH">
            </div>  
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" class="form-control" value="<?= $row['DiaChi']?>" id="" placeholder="Nhập vào Địa Chỉ" name="DiaChi">
            </div>
            <div class="form-group">
                <label for="">Số Điện Thoại</label>
                <input type="number" class="form-control" value="<?= $row['Phone']?>" id="" placeholder="Nhập vào Số Điện Thoại" name="Phone">
            </div>
            <div class="form-group">
                <label for="">Mô Tả</label>
                <input type="text" class="form-control" value="<?= $row['MoTa']?>" id="" placeholder="Nhập vào Mô Tả" name="MoTa">
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

<?php include_once('public/Layouts/footer.php'); ?>