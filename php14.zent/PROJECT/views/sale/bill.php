<?php 

    //include("models/connection_.php");  
    include_once('public/Layouts/header.php');
?>

<div class="container-fruid">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Bán Hàng</h3>
    </div>
  </div>
  <div class="row">
    <div class="card col-lg-4" style="padding: 0px;  margin-left: 40px;">
            <div class="card-header">
              <h4>Danh sách Sản Phẩm</h4></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mă sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Đơn Giá</th>
                </tr>
              </thead>
              <tbody>
                <?php   foreach ($product as $row) { ?>
                <tr>
                  <td><?= $row['MA_SP'] ?></td>
                  <td><?= $row['TEN_SP'] ?></td>
                  <td><?= $row['SO_LUONG'] ?></td>
                  <td>
                    <a href="index.php?mod=sale&act=add2cart&MA_SP=<?= $row['MA_SP'] ?>" class="btn btn-success"><i class="fas fa-shopping-cart"></i></a> 
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <div class="card col-lg-7" style="padding: 0px; margin-left: 40px;">
            <div class="card-header">
          <h4>Danh sách sản phẩm khách hàng chọn</h4>
        </div>
        <div class="card-body">
          <h5 class="ml-1">Thông tin khách hàng</h5>
          <h6 style="margin-left: 20px;"> Mă khách hàng: <?= $row ['MaKH'] ?></h6>
          <h6 style="margin-left: 20px;"> Tên khách hàng: <?= $row ['TenKH'] ?></h6>
          <h6 style="margin-left: 20px;"> Địa Chỉ: <?= $row ['DiaChi'] ?></h6>
          <h6 style="margin-left: 20px;"> Số Điện Thoại: <?= $row ['Phone'] ?></h6>
        </div>
        <div class="card-body">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Mă sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đon giá</th>
                <th>Thành Tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sum = 0;
              foreach ($cart as $product)
              {
                $sum +=$product['SO_LUONG']*$product['GIA_BAN'];  ?>
                <tr>
                  <td><?= $product['MA_SP'] ?></td>
                  <td><?= $product['TEN_SP'] ?></td>
                  <td>
                    <a class="btn btn-success btn-sm" href="index.php?mod=sale&act=add2cart&Ma_SP=<?= $product['MA_SP'] ?>"><i class="fas fa-plus-circle"></i></a>
                    <?= $product['So_Luong'] ?>
                    <a class="btn btn-success btn-sm" href="index.php?mod=sale&act=remove_product&MA_SP=<?= $product['MA_SP'] ?>"><i class="fas fa-minus-circle"></i></a>
                  </td>
                  <td><?= number_format($product['GIA_BAN']) ?> VNĐ</td>
                  <td><?= number_format($product['SO_LUONG'] * $product['GIA_BAN'] )?> VNĐ</td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
          <h4><strong>Tổng Tiền: <?= number_format($sum) ?> VNĐ</strong></h4>
          <a class="btn btn-success btn-lg" href="?mod=sale&act=payment"><strong>Thanh toán</strong></a>
          <a class="btn btn-success btn-lg" href="?mod=sale&act=destroy"><strong>Hủy Thanh toán</strong></a>
        </div>
    </div>
  </div>
</div>

<?php include_once('public/Layouts/footer.php'); ?>     