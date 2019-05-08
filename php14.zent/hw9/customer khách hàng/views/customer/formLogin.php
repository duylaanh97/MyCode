<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    
    /* Reset */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

*:focus {
  outline: 0;
}

html {
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

.form {
  background: url('https://i0.imgpile.com/2016/09/14/7861aab59aa07c9499278339f41522c3.jpg') rgba(15, 15, 15, 0.9) left top / cover no-repeat scroll;
  border-radius: 5px;
  box-shadow: 0 0 15px #1c1c1c;
  margin: 1.5em auto 0 auto;
  max-width: 400px;
  padding: 2em;
  width: 90%;
}

.ctn-img-title-login {
  text-align: center;
}

.img-login {
  max-width: 7em;
  pointer-events: none;
  width: 90%;
}

.title-form-login {
  color: #cdcdcd;
  font: bold 2em 'Dancing Script', sans-serif;
  margin-top: 25px;
}

.ctn-input {  
  margin-top: 50px;
  position: relative;
}

.support-text {
  color: #cdcdcd;
  font: normal 15px 'Quicksand', sans-serif;
  left: 2px;
  pointer-events: none;
  position: absolute;
  top: 2px;
  transition: 0.3s ease all;
}

.support-text.active-input {
  color: #ffffff;
  font-size: 13px;
  transform: translateY(-125%);
}

.effect-input {
  background-color: rgba(0, 0, 0, 0);
  border-style: none;
  border-bottom: 1px solid #cdcdcd;
  color: #ffffff;
  display: block;
  font: normal 15px 'Quicksand', sans-serif;
  height: 30px;
  letter-spacing: 1px;
  max-width: 400px;
  padding: 1em 1.5em 1em 2px;
  width: 100%;
}

.validate-input:invalid {
  border-bottom-color: #ff807c;
}

.bar:before,
.bar:after {
  background-color: #ffffff;
  border-radius: 50%;
  bottom: 0;
  content: '';
  height: 2px;
  position: absolute;
  transition: 0.5s ease all;
  width: 0;
}

.bar {
  display: block;
  position: relative;
}

.bar:before {
  left: auto;
  right: 0;
}

.bar.active-input:before,
.bar.active-input:after {
   width: 75%;
}

.validate-input:invalid + .bar:before,
.validate-input:invalid + .bar:after {
  background-color: #ff807c;
}

.clear-input,
.eye {
  bottom: 10px;
  color: #ffffff;
  cursor: pointer;
  display: none;
  font-size: 12px;
  position: absolute;
}

.clear-input {
  right: 5px;
}

.eye {
  right: 20px;
}

.validate-input:invalid + .bar .clear-input,
.validate-input:invalid + .bar .eye {
  color: #ff807c;
}

.ctn-btns {
  display: flex;
  justify-content: space-around;
  margin-top: 50px;
}

.btns {
  background-color: #1d7566;
  border-radius: 2px;
  border-style: none;
  box-shadow: 1px 0px #202020,
              0px 1px #202020,
              2px 1px #202020,
              1px 2px #202020,
              3px 2px #202020,
              2px 3px #202020,
              4px 3px #202020,
              3px 4px #202020,
              5px 4px #202020,
              4px 5px #202020,
              6px 5px #202020,
              5px 6px #202020;
  color: #ffffff;
  cursor: pointer;
  font: normal 13px 'Quicksand', sans-serif;
  letter-spacing: 1px;
  margin: 0 5px;
  padding: 10px 20px;
  transition: 0.3s ease all;
}

.btns:hover,
.btns:focus {
  background-color: #20806f;
}

.btns:active {
  box-shadow: 1px 0px #202020,
              0px 1px #202020,
              2px 1px #202020,
              3px 2px #202020,
              2px 3px #202020,
              4px 3px #202020,
              3px 4px #202020;
  transform: translate(2px);
}

</style>
</head>
<body>
  <form action="?mod=login&act=login" method="POST" autocomplete="off" class="form">
  <div class="ctn-img-title-login">
    <img src="https://cdn4.iconfinder.com/data/icons/ios-web-user-interface-multi-circle-flat-vol-7/512/Lock_protected_safe_privacy_password_security-512.png" alt="Login" title="Login" class="img-login">
    <h1 class="title-form-login">
      Login
    </h1>
  </div>
  
  <div class="ctn-input">
    <label for="user" class="support-text">
      Email
    </label>
    <input type="text" id="user" class="effect-input" minlength="2" maxlength="100" autocomplete="off" required="required" name="Email">
    <span class="bar">
      <i class="fa fa-times clear-input" aria-hidden="true"></i>
    </span>
  </div>
  
  <div class="ctn-input">
    <label for="pass" class="support-text">
      Password
    </label>
    <input type="password" class="effect-input password" minlength="5" maxlength="100" autocomplete="off" required="required" name="Password">
    <span class="bar">
      <i class="fa fa-times clear-input" aria-hidden="true"></i>
      <i class="fa fa-eye-slash eye" aria-hidden="true"></i>
    </span>
  </div>
  
  <div class="ctn-btns">
    <input type="reset" id="reset-inputs" class="btns" value="Sign Up">
    <input type="submit" class="btns" value="Login">
  </div>
  
</form>
</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
  
  $('.effect-input').on('focus', function() {
    $(this).siblings('.support-text, .bar').addClass('active-input');
  });
  
  $('.effect-input').on('keydown keyup', function() {
    $(this).addClass('validate-input');
    if ( $(this).val().length >= 1 ) {
      $(this).siblings('.bar').children('.clear-input').fadeIn();
    } else {
        $(this).siblings('.bar').children('.clear-input').fadeOut();
      }
  });
  
  $('.password').on('keydown keyup', function() {
    if ( $(this).val().length >= 1 ) {
      $(this).siblings('.bar').children('.eye').fadeIn();
    } else {
        $(this).siblings('.bar').children('.eye').fadeOut();
      }
  });
  
  $('.effect-input').on('focusout', function() {
    $(this).addClass('validate-input');
    if ( $(this).val() == '' ) {
      $(this).siblings('.support-text, .bar').removeClass('active-input');
    }
  });
  
  $('.clear-input').on('click', function() {
    $(this).fadeOut();
    $(this).siblings('.eye').fadeOut();
    $(this).parent('.bar').siblings('.effect-input').val('');
    $(this).siblings('.eye').addClass('fa-eye-slash').removeClass('fa-eye view-pass');
    $(this).parent('.bar').siblings('.password').attr('type', 'password');
    $(this).parent('.bar').siblings('.effect-input').focusout();
    $(this).parent('.bar').siblings('.effect-input').removeClass('validate-input');
  });
  
  $('.eye').on('click', function() {
    $(this).toggleClass('fa-eye-slash fa-eye view-pass');
    if ( $(this).hasClass('view-pass') ) {
      $(this).parent('.bar').siblings('.password').attr('type', 'text');
    } else {
        $(this).parent('.bar').siblings('.password').attr('type', 'password');
      }
  });
  
  $('#reset-inputs').on('click', function() {
    $(this).blur();
    $('.clear-input, .eye').fadeOut();
    $('.eye').addClass('fa-eye-slash').removeClass('fa-eye view-pass');
    $('.password').attr('type', 'password');
    $('.effect-input').removeClass('validate-input');
    $('.effect-input').siblings('.support-text, .bar').removeClass('active-input');    
  });

});

</script>