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
  <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/toastr/toastr.min.css">
      <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/dist/css/adminlte.min.css">
    <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/assets/faicons/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-grey navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('user/index');?>" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
    <div class="btn-group">
      <button type="button" class="btn btn-default btn-flat"><b  style="text-transform: uppercase;"><?php echo $details->last_name;?></b></button>
      <button type="button" class="btn btn-default btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
      <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu" role="menu">
      <a class="dropdown-item" data-toggle="modal" data-target="#updatemodal" style="cursor: pointer;">Update Profile</a>
      <a class="dropdown-item" data-toggle="modal" data-target="#updatepass" style="cursor: pointer;">Change Password</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?=site_url('user/logout/'.'');?>">Log Out</a>
      </div>
    </div>
   

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-white elevation-4" style="background-color: #D5AE00;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <i class="fa-brands fa-slack"></i>
      <span class="brand-text font-weight-bold">PDRRMO Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fa-solid fa-id-card-clip"></i>
        </div>
          <span><a href="#" class="d-block">&nbsp;<?php echo $details->first_name;?> <?php echo $details->middle_name;?> <?php echo $details->last_name;?></a></span>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
          <li class="nav-header">OPTIONS</li>
                    <li class="nav-item">
            <a href="<?php echo site_url('user/index');?>" class="nav-link">
              <i class="fa fa-home" aria-hidden="true"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('user/db_item');?>" class="nav-link">
              <i class="fa-solid fa-screwdriver-wrench"></i>
              <p>
                Items
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('user/db_borrower');?>" class="nav-link">
              <i class="fa-solid fa-person"></i>
              <p>
                Borrowers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('user/db_status');?>" class="nav-link">
              <i class="fa-solid fa-circle-exclamation"></i>
              <p>
                Status
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('user/db_report');?>" class="nav-link">
              <i class="fa-solid fa-file"></i>
              <p>
                Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('user/db_register');?>" class="nav-link">
              <i class="fa-solid fa-id-card"></i>
              <p>
                Account Management  
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('user/db_history');?>" class="nav-link active">
              <i class="fa-solid fa-book"></i>
              <p> History
              </p>
            </a>
          </li>
            </ul>
        
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('user/index');?>">Home</a></li>
              <li class="breadcrumb-item active">History</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <?php alert_message('status'); ?> 
                <h3 class="card-title">History or record of actions done in the system.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="text-align:center;">History ID</th>
                      <th style="text-align:center;">Action</th>
                      <th style="text-align:center;">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $row) {  ?> 
                    <tr>
                    <td style="text-align:center;"><?php echo $row->history_id; ?></td>
                    <td style="text-align:center; font-style: italic;"><b><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name; ?></b> <?php echo $row->action?></td>
                    <td style="text-align:center;"><div class="badge badge-success"><?php echo $row->date_created; ?></div></td>
                    <?php } ?>
                    <tfoot>
                      <th style="text-align:center;">History ID</th>
                      <th style="text-align:center;">Action</th>
                      <th style="text-align:center;">Date</th>
                    </tfoot>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /Update profile -->
<div class="modal fade" id="updatemodal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Update Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" action="<?php echo site_url('user/update_profile/'.$details->register_id);?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="hidden" name="hid_fname" value="<?php echo $details->first_name;?>" readonly>
                  <input type="hidden" name="hid_mname" value="<?php echo $details->middle_name;?>" readonly>
                  <input type="hidden" name="hid_lname" value="<?php echo $details->last_name;?>" readonly>
                  <input type="hidden" name="hid_office" value="<?php echo $details->office;?>" readonly>
                  <input type="hidden" name="hid_phone" value="<?php echo $details->phone;?>" readonly>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Last Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="last_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="150" class="form-control" value="<?php echo $details->last_name;?>" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">First Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="first_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="150" class="form-control" value="<?php echo $details->first_name;?>" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Middle Initial</label>
                   <div class="col-sm-10">
                   <input type="text" name="middle_name" maxlength="150" class="form-control" value="<?php echo $details->middle_name;?>">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Address/Office <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="office" value="<?php echo $details->office;?>" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Phone Number <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" minlength="11" maxlength = "11"  onpaste="return false;" name="phone" value="<?php echo $details->phone;?>" class="form-control" required>
                   </div>
                   </div>  
                </div>
                <!-- /.card-body -->        
                      <div class="modal-footer justify-content-right">
                      <button type="submit" class="btn btn-success">Update</button>
                      </div>
              
              </form>
             </div>
            </div>
          <!-- /.modal-content -->         
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- /Change password -->
<div class="modal fade" id="updatepass">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" action="<?php echo site_url('user/update_pass/'.$details->register_id);?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Current Password <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <div class="input-group mb-3">
                   <input type="password" name="current" id="current" maxlength="150" class="form-control" required>
                   <div class="input-group-append">
                   <div class="input-group-text">
                   <i class="fa-solid fa-eye" onClick="showpwd1('current', this)" style="cursor: pointer;"></i>
                   </div>
                   </div>
                   </div>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">New Password <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                    <div class="input-group mb-3">
                   <input type="password" name="new" id="new" maxlength="150" class="form-control" required>
                   <div class="input-group-append">
                   <div class="input-group-text">
                   <i class="fa-solid fa-eye" onClick="showpwd2('new', this)" style="cursor: pointer;"></i>
                   </div>
                   </div>
                   </div>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Confirm Password <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <div class="input-group mb-3">
                   <input type="password" name="confirm" id="confirm" maxlength="150" class="form-control" required>
                   <div class="input-group-append">
                   <div class="input-group-text">
                   <i class="fa-solid fa-eye" onClick="showpwd3('confirm', this)" style="cursor: pointer;"></i>
                   </div>
                   </div>
                   </div>
                   </div>
                   </div>  
                </div>
                <!-- /.card-body -->        
                      <div class="modal-footer justify-content-right">
                      <button type="submit" class="btn btn-success">Update</button>
                      </div>
              
              </form>
             </div>
            </div>
          <!-- /.modal-content -->         
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<script src="<?php echo BASE_URL(); ?>/assets/faicons/js/all.js"></script> 
<!-- jQuery -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL(); ?>/public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL(); ?>/public/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
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

function showpwd2(id, el) 
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

function showpwd3(id, el) 
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "order": [[0, 'desc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          initComplete: function () {
            this.api().columns([0,2]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value="" selected>Select Filter</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    var val = $('<div/>').html(d).text();
                    select.append( '<option value="' + val + '">' + val + '</option>' )
                } );
            } );
        }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      initComplete: function () {
            this.api().columns([0,1,2,3,4,5]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value="" selected>Select Filter</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    var val = $('<div/>').html(d).text();
                    select.append( '<option value="' + val + '">' + val + '</option>' )
                } );
            } );
        }

    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


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
