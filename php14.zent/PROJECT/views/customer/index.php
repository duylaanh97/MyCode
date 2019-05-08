<?php 

    // include("models/Connection.php");  
    include_once('public/Layouts/header.php');
?>

    <div class="container">
        <h2 align="center">DANH SÁCH KHÁCH HÀNG</h2>
        
        <a href="?mod=customer&act=add" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>

                <?php include_once('public/Layouts/header.php'); ?> 
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
                   foreach ($data as $row)  { 
                ?>


              <tr>
                <td><?php echo $row['MaKH']; ?></td>
                <td><?php echo $row['TenKH']; ?></td>
                <td><?php echo $row['DiaChi']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['MoTa']; ?></td>
                <td>
                    <a href="?mod=customer&act=detail&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-success">Detail</a> 
                     <a href="?mod=customer&act=edit&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-warning">Update</a>  
                    <a href="?mod=customer&act=delete&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-danger">Delete</a>

                </td>
              </tr>
              
              <?php    
                    }
                 ?>
                 
            </tbody>
          </table>
    </div>

<?php include_once('public/Layouts/footer.php'); ?>