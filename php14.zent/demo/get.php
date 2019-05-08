<?php 
   echo 'Tên đăng nhập: '.$_GET['user'].'<br>';
   echo 'Mật khẩu: '.$_GET['pwd'];

   $user = $_GET['user'];
   $pwd = $_GET['pwd'];
   if ($user == "Duy" && $pwd == "Duylatao") {
   		echo "Welcome sir !";
   }else {
   		echo "Login False";
   }
   
?>