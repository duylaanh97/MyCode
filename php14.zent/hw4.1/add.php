<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="add_process.php" method="POST" role="form">
            <legend><center><h1>NHẬP THÔNG TIN SINH VIÊN</h1></center></legend>
            
            <div class="form-group">
                <label for="">Mã Sinh Viên</label>
                <input type="number" class="form-control" id="" placeholder="Nhập mã sinh viên" name="ID">
            </div>
            
            <div class="form-group">
                <label for="">Họ Và Tên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="name">
            </div>  

            <div class="form-group">
                <label for="">Số Điện Thoại</label>
                <input type="number" class="form-control" id="" placeholder="Nhập số điện thoại" name="phone">
            </div>  

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="" placeholder="Nhập Email" name="Email">
            </div>  

            <div class="form-group">
                <label for="">Giới Tính</label>
                <br>
                <input name="Gender" type="radio" value="Male" /> Male
                <input name="Gender" type="radio" value="Female" /> Female 
            </br>
            </div>

            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="address">
            </div>  
            
            <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
        </form>
    </div>
</body>
</html>