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
    <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL(); ?>/public/dist/css/adminlte.min.css">

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
            <a href="<?php echo site_url('user/index');?>" class="nav-link active">
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
            <a href="<?php echo site_url('user/db_history');?>" class="nav-link">
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
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('user/index');?>">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
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
                <h3 class="card-title">Dashboard General Information</h3>

                <?php alert_message('status'); ?> 

              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo $no_item;  ?></h3>

                <p>Number of items</p>
              </div>
              <div class="icon">
               <i class="fa-solid fa-screwdriver-wrench"></i>
              </div>
              <a href="<?php echo site_url('user/db_item');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo $no_borrower;  ?></h3>

                <p>Number of borrowers</p>
              </div>
              <div class="icon">
               <i class="fa-solid fa-person"></i>
              </div>
              <a href="<?php echo site_url('user/db_borrower');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo $no_borrow;  ?></h3>

                <p>Number of unreturned items</p>
              </div>
              <div class="icon">
               <i class="fa-solid fa-circle-exclamation"></i>
              </div>
              <a href="<?php echo site_url('user/db_status');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo $no_account;  ?></h3>

                <p>Number of accounts</p>
              </div>
              <div class="icon">
               <i class="fa-solid fa-id-card"></i>
              </div>
              <a href="<?php echo site_url('user/db_register');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

  
          <!-- /.col -->
          <div class="col">
            <div class="card card-primary">
              <div class="card-header"><h4>Calendar of Borrow Status</h4></div>
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<!-- Bootstrap -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL(); ?>/public/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo BASE_URL(); ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?php echo BASE_URL(); ?>/public/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL(); ?>/public/dist/js/demo.js"></script>



<script type="text/javascript">
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
  
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
 
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------



    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap5',
      //Random default events
   
       events: "<?php echo base_url(); ?>user/schedule_load",
      editable  : false,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();

  })
</script>

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

</body>
</html>
