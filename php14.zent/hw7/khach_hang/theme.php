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
        <h2 align="center">DANH SÁCH KHÁCH HÀNG</h2>
        <a href="theme_add.php" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
              <tr>
                <th>Mã Khách Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Mô Tả</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>

                <?php 
                    while ($row = $result->fetch_assoc()) { 
                ?>


              <tr>
                <td><?php echo $row['MaKH']; ?></td>
                <td><?php echo $row['TenKH']; ?></td>
                <td><?php echo $row['DiaChi']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['MoTa']; ?></td>
                <td>
                    <a href="detail.php?mkh=<?php echo $row['MaKH']; ?>" class="btn btn-success">Detail</a> 
                     <a href="theme_edit.php?mkh=<?php echo $row['MaKH']; ?>" class="btn btn-warning">Update</a>  
                    <a href="delete.php?mkh=<?php echo $row['MaKH']; ?>" class="btn btn-danger">Delete</a>

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