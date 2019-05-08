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
        <h2 align="center">DANH SÁCH SẢN PHẨM</h2>
        <a href="?mod=product&act=add" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá Nhập</th>
                <th>Giá Bán</th>
                <th colspan="3">Action</th>
              </tr>

             
            </thead>
            <tbody>

                <?php
                 foreach ($data as $row) {                 
                    ?>

              <tr>
                <td><?= $row ['MA_SP']; ?></td>
                <td><?= $row ['TEN_SP']; ?></td>
                <td><?= $row ['SO_LUONG']; ?></td>
                <td><?= number_format($row ['GIA_NHAP']); ?></td>
                <td><?= number_format($row ['GIA_BAN']); ?></td>
                <td>
                    <a href="?mod=product&act=detail&msp=<?php echo $row['MA_SP']; ?>" class="btn btn-success">Detail</a> 
                     <a href="?mod=product&act=edit&msp=<?php echo $row['MA_SP']; ?>" class="btn btn-warning">Update</a>  
                    <a href="?mod=product&act=delete&msp=<?php echo $row['MA_SP']; ?>" class="btn btn-danger">Delete</a>

                </td>
              </tr>

              <?php } ?>
            </tbody>
          </table>
    </div>
</body>
</html>

<?php include_once('public/Layouts/footer.php'); ?> 