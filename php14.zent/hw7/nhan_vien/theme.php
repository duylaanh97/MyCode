<?php 
    include("connect.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nhân Viên</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 align="center">DANH SÁCH NHÂN VIÊN</h2>
        <a href="theme_add.php" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
              <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Năm Sinh</th>
                <th>Quê Quán</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>

                <?php 
                    while ($row = $result->fetch_assoc()) { 
                ?>


              <tr>
                <td><?php echo $row['MaNV']; ?></td>
                <td><?php echo $row['TenNV']; ?></td>
                <td><?php echo $row['NamSinh']; ?></td>
                <td><?php echo $row['Que']; ?></td>
                <td>
                    <a href="detail.php?mnv=<?php echo $row['MaNV']; ?>" class="btn btn-success">Detail</a> 
                     <a href="theme_edit.php?mnv=<?php echo $row['MaNV']; ?>" class="btn btn-warning">Update</a>  
                    <a href="delete.php?mnv=<?php echo $row['MaNV']; ?>" class="btn btn-danger">Delete</a>

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