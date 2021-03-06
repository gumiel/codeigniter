<?php //$this->templateci->addEndListCss([["url"=>"asdasd.css"]]); ?>
<?php //$this->templateci->addEndListJs([["url"=>"asdasd.js"]]); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->templateci->title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <?php $this->load->view('template/css'); ?>


</head>
<body class="hold-transition login-page">
<?php $this->load->view('template/notify'); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>DEV</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia sesión para comenzar</p>

    <form action="<?php echo site_url("/nucleo/NucPublico/loginProcess") ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="usuario[cuenta]" class="form-control" placeholder="Usuario" autofocus autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="usuario[clave]" class="form-control" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div>
          <label>CAPTCHA:</label><img src="<?php echo site_url("nucleo/NucPublico/crearCaptcha") ?>" alt="CAPTCHA" class="captcha-image">
          
          <button type="button" class="refresh-captcha btn btn-default "><i class="glyphicon glyphicon-refresh"></i></button>
          <p>Ingresar texto de captcha:<input  name="captcha" id="captcha" class="form-control" value="" ></p>
          
        </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="#">Recuperar contraseña</a><br>
    <a href="register.html" class="text-center">Registrar Usuario</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->load->view('template/js'); ?>
<script>
    var refreshButton = document.querySelector(".refresh-captcha");
    refreshButton.onclick = function() {
      document.querySelector(".captcha-image").src = '<?php echo site_url("/nucleo/NucPublico/crearCaptcha/") ?>?date=' + Date.now();
    }
  </script>
</body>
</html>
