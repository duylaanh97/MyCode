<?php 

    include("models/Connection.php");  
    include_once('public/Layouts/header.php');
?>

    <h3 class="page-header">Bán Hàng</h3>
    <div class="container">
        <h2 align="center">DANH SÁCH KHÁCH HÀNG</h2>
        <li> Vui lòng tìm khách hàng sau đó click vào Tạo Hóa Đơn </li>
        <li> Nếu chưa có thông tin khách hàng, vui lòng tạo mới khách hàng trước </li>
        
        <a href="?mod=customer&act=add" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
              <tr>
                <th>Mã Khách Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Mô Tả</th>
                <th></th>
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
                    <a href="?mod=sale&act=purchase&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-success">Tạo Hóa Đơn</a> 
                    <!--  <a href="?mod=customer&act=edit&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-warning">Update</a>  
                    <a href="?mod=customer&act=delete&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-danger">Delete</a>
 -->
                </td>
              </tr>
              
              <?php    
                    }
                 ?>
                 
            </tbody>
          </table>
    </div>

<?php include_once('public/Layouts/footer.php'); ?>