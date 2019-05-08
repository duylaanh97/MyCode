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
    <h3 align="center">CẬP NHẬT THÔNG TIN NHÂN VIÊN</h3>
    <hr>
        <form action="?mod=employee&act=update" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã Nhân Viên</label> 
                <input type="text" class="form-control" value="<?= $row['MaNV'] ?>" id="" placeholder="Mã Nhân Viên" name="MaNV" readonly>
            </div>
            <div class="form-group">
                <label for="">Tên Nhân Viên</label>
                <input type="text" class="form-control" value="<?= $row['TenNV'] ?>" id="" placeholder="Nhập vào tên Nhân Viên" name="TenNV">
            </div>  
            <div class="form-group">
                <label for="">Năm Sinh</label>
                <input type="text" class="form-control" value="<?= $row['NamSinh']?>" id="" placeholder="Nhập vào Năm Sinh" name="NamSinh">
            </div>
            <div class="form-group">
                <label for="">Quê Quán</label>
                <input type="text" class="form-control" value="<?= $row['Que']?>" id="" placeholder="Nhập vào Số Quê Quán" name="Que">
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