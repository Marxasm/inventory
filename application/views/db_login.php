<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PDRRMO Warehouse Management System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/dist/css/adminlte.min.css">
    <!-- Sweet Alert -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page" style="background: #DADADA;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-warning">
    <div class="card-header text-center">
      <h1><b>PDRRMO</b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

       <form action="<?php echo site_url('user/login/');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
           <div class="input-group-append">
            <div class="input-group-text bg-white">
          <i class="fa-solid fa-eye" onClick="showpwd1('pass', this)" style="cursor: pointer;"></i>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-warning">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="<?php echo site_url('user/forgot1/');?>" style="color: grey;">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<!-- /.login-box -->
<script src="<?php echo BASE_URL(); ?>/assets/faicons/js/all.js"></script> 
<!-- jQuery -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL(); ?>/public/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">

function showpwd1(id, el) 
{
  let x = document.getElementById(id);
  if (x.type === "password") {
    x.type = "text";
    $(el).toggleClass('fa-solid fa-eye-slash');
  } else {
    x.type = "password";
    $(el).toggleClass('fa-solid fa-eye');
  }
}
</script>
<script>
   <?php if($this->session->flashdata('success')) : ?>
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '<?=$this->session->flashdata('success'); ?>'
})


 <?php elseif($this->session->flashdata('error')) : ?>
   const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: '<?=$this->session->flashdata('error'); ?>'
})

 <?php elseif($this->session->flashdata('warning')) : ?>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'warning',
  title: '<?=$this->session->flashdata('warning'); ?>'
  })
<?php endif; ?>
</script>
</body>
</html>
