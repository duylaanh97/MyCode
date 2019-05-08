<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nhân Viên</title>
    
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
    <h3 align="center">THÊM MỚI NHÂN VIÊN</h3>
    <hr>
        <form action="?mod=employee&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã Nhân Viên</label>
                <input type="text" class="form-control" id="" placeholder="Mã nhân viên" name="MaNV">
            </div>
            <div class="form-group">
                <label for="">Tên Nhân Viên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên nhân viên" name="TenNV">
            </div>  
            <div class="form-group">
                <label for="">Năm Sinh</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào năm sinh" name="NamSinh">
            </div>
            <div class="form-group">
                <label for="">Quê Quán</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào quê quán" name="Que">
            </div>
             <!--div class="form-group">
                <label for="">Ảnh Sản phẩm</label>
                <input type="file" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="ANH_SP">
            </div-->
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</body>
</html>

<?php include_once('public/Layouts/footer.php'); ?> 