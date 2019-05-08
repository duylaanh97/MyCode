<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent Group</title>
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body> -->

<?php 
    include_once('public/Layouts/header.php');
?>
    <div class="container">
    <h3 align="center">ZENT GROUP - PHP - MYSQL</h3>
    <h3 align="center">THÊM MỚI SẢN PHẨM</h3>
    <hr>
        <form action="?mod=product&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="Mã sản phẩm" name="MA_SP">
            </div>
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào tên sản phẩm" name="TEN_SP">
            </div>  
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào số lượng" name="SO_LUONG">
            </div>
            <div class="form-group">
                <label for="">Giá nhập</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào giá nhập hàng" name="GIA_NHAP">
            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="number" class="form-control" id="" placeholder="Nhập vào giá bán" name="GIA_BAN">
            </div>
             <!--div class="form-group">
                <label for="">Ảnh Sản phẩm</label>
                <input type="file" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="ANH_SP">
            </div-->
            <div class="form-group">
                <label for="">Loại Sản phẩm</label>
                <select class="form-control" name="MA_LOAI_SP"> 
                    <?php foreach ($loaisp as $key => $value) {?>
                        <option value="<?php echo $value['MA_LOAI_SP'] ?>"><?php echo $value['TEN_LOAI_SP'] ?></option>
                    <?php } ?>
                </select>         
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</body>
</html>

<?php include_once('public/Layouts/footer.php'); ?> 