<?php 
    include("connect.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Khách Hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 align="center">DANH SÁCH SẢN PHẨM</h2>
        <a href="theme_add.php" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
              <tr>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá Nhập</th>
                <th>Giá Bán</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>

                <?php 
                    while ($row = $result->fetch_assoc()) { 
                ?>


              <tr>
                <td><?php echo $row['MA_SP']; ?></td>
                <td><?php echo $row['TEN_SP']; ?></td>
                <td><?php echo $row['SO_LUONG']; ?></td>
                <td><?php echo number_format($row['GIA_NHAP']); ?></td>
                <td><?php echo number_format($row['GIA_BAN']); ?></td>
                <td>
                    <a href="detail.php?msp=<?php echo $row['MA_SP']; ?>" class="btn btn-success">Detail</a> 
                     <a href="theme_edit.php?msp=<?php echo $row['MA_SP']; ?>" class="btn btn-warning">Update</a>  
                    <a href="delete.php?msp=<?php echo $row['MA_SP']; ?>" class="btn btn-danger">Delete</a>

                </td>
              </tr>

              <?php    
                    }
                 ?>
            </tbody>
          </table>
    </div>
</body>
</html>