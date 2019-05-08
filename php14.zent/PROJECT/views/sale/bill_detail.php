  <?php 
      // include("models/Connection.php");
      include_once('public/Layouts/header.php');
  ?>

  <div class="container"  >
    <div class="col-sm-6"  >
      <h3><b>Shop</b></h3>
      <h4><i>Address: 262 Khương Đình</i></h4>
      <h4><i>Mobile: 0968452967</i></h4>
    </div>
    <div class="col-sm-6" >
      <h3><b>Hóa Đơn Bán Hàng</b></h3>
      <h4><i>Mã Hóa Đơn: <?php echo $hoadon['MaHD']; ?></i></h4>
      <h4><i>Ngày Bán: <?php echo $hoadon['NgayBan']; ?></i></h4>
    </div>
    
    <div style="clear: both;"></div>
    <h3 class="page-header"></h3>
    <li><b>Khách Hàng</b> : <?php echo $customer['TenKH']." - ".$customer['Phone']; ?></li>
    <li><b>Địa Chỉ</b> : <?php echo $customer['DiaChi']; ?></li>


    <table class="table">
      <thead>
        <tr>
          <th>Mã Sản Phẩm</th>
          <th>Tên Sản Phẩm</th>
          <th>Số Lượng</th>
          <th>Giá Bán</th>
          <th>Thành Tiền</th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach ($data as $row)  {
          $product = $productModel->find($row['MaSP']);
        ?>


          <tr>
            <td><?php echo $row['MaSP']; ?></td>
            <td><?php echo $product['TEN_SP']; ?></td>
            <td><?php echo $row['SoLuong']; ?></td>
            <td><?php echo number_format($row['GiaBan']); ?></td>
            <td><?php echo number_format($row['GiaBan'] * $row['SoLuong']);  ?></td>
          </tr>

        <?php    
          }
        ?>

        <tr>
          <td colspan="4"><b>Tổng Tiền</b></td>
          <td> <?php echo number_format($hoadon['TongTien']); ?> </td>
        </tr>
    
      </tbody>
    </table>
    <button type="submit" class="btn btn-success print" >In Hóa Đơn</button>
  </div>

  <?php include_once('public/Layouts/footer.php'); ?>