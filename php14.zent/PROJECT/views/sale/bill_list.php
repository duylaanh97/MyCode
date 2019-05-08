<?php 

    // include("models/Connection.php");  
    include_once('public/Layouts/header.php');
?>

    <div class="container">
        <h2 align="center">DANH SÁCH HÓA ĐƠN</h2>
        <table class="table">
            <thead>
              <tr>
                <th>Mã Hóa Đơn</th>
                <th>Mã Khách Hàng</th>
                <th>Mã Nhân Viên</th>
                <th>Ngày Bán</th>
                <th>Tổng Tiền</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

                <?php 
                   foreach ($data as $row)  { 
                ?>


              <tr>
                <td><?php echo $row['MaHD']; ?></td>
                <td><?php echo $row['MaKH']; ?></td>
                <td><?php echo $row['MaNV']; ?></td>
                <td><?php echo $row['NgayBan']; ?></td>
                <td><?php echo $row['TongTien']; ?></td>
                <td>
                    <a href="?mod=customer&act=delete&mkh=<?php echo $row['MaKH']; ?>" class="btn btn-danger">Chi Tiết</a>

                </td>
              </tr>
              
              <?php    
                    }
                 ?>
                 
            </tbody>
          </table>
    </div>

<?php include_once('public/Layouts/footer.php'); ?>