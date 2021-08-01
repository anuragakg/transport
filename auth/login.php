<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../parts/head-tag.php'); ?>
  <title>Transport System</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js" integrity="sha256-6rXZCnFzbyZ685/fMsqoxxZz/QZwMnmwHg+SsNe+C/w=" crossorigin="anonymous"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript">
      var verifyCallback = function(response) {
        // We can Write Code For Callback When Captcha Success
      };
      var onloadCallback = function() {
        grecaptcha.render('capcha', {
          'sitekey' : '6LeGL98UAAAAAAvnPCKRvsY4_wmXDhGRUxFtqAb6',
          'callback' : verifyCallback,
          'theme' : 'light'
        });
      };
    </script>
</head>
<style>
  .login-form {
    width: 340px;
      margin: 50px auto;
  }
    .login-form form {
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>


<body >
<div class="login-form">
    <form  method="post" id="formID">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input autocomplete="off" type="text" class="form-control validate[required]" id="username">
        </div>
        <div class="form-group">
            <input autocomplete="off" type="password" class="form-control validate[required]" id="password">
        </div>
        <div class="form-group">
            <div id="capcha" data-sitekey="6LeGL98UAAAAAAvnPCKRvsY4_wmXDhGRUxFtqAb6git"></div>
              <span id="captcha-msg" style="color:red"></span>
        </div>
        <div class="form-group">
            <!-- <button type="submit" class="btn btn-primary btn-block">Log in</button> -->
            <button type="submit" class="btn btn-primary bg-login btn-block" id="login">Login</button>
        </div>
        <div class="clearfix">
            <!-- <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label> -->
            <a href="forgot-password.php" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
  </div>

<?php include('../parts/login-js-files.php'); ?>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
<script type="text/javascript" src="../assets/js/custom/auth/Barrett.js"></script>
<script type="text/javascript" src="../assets/js/custom/auth/BigInt.js"></script>
<script type="text/javascript" src="../assets/js/custom/auth/rsa_min.js"></script>
<script type="text/javascript" src="../assets/js/custom/login.js?v=<?php echo time(); ?>"></script>

</body>
</html>
