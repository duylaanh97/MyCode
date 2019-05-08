<?php
session_start();

if (isset($_SESSION['info'])){
  $data_arr = $_SESSION['info'];
}else{
  $data_arr = array();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent- Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
         <h2 align="center"> Danh sách người dùng </h2>
          <a href="add.php" class=""btn btn-primary"><button>Thêm Mới</button></a>
        <?php
        if (isset($_COOKIE['msg'])) {
        ?>
       <div class="alert alert-success">
       <strong>Thông báo: </strong> <?php echo $_COOKIE['msg'];?>
       </div>
       <?php } ?>
       <table class="table">
        	<thead>
        		<tr>
        			<th>STT</th>
        			<th>Mã sinh viên</th>
        			<th>Tên sinh viên</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php
        	   $i = 0;
              foreach ($data_arr as $value) {
        	   $i++;
        	?>
          <tr>
        	 <td><?php echo $i; ?></td>
        	 <td><?php echo $value['ID'];?></td>
        	 <td><?php echo $value['name'];?></td>
            <td>
            	<a href="detail.php?ID=<?php echo $value['ID']; ?>" class = "btn btn-sucsess">Detail</a>
            	<a href="delete.php?ID=<?php echo $value['ID']; ?>" class = "btn btn-danger">Delete</a>
             </td>
          </tr>
          <?php } ?>
        	</tbody>
        </table>
    </div>
</body>
</html>>