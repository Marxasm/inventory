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
            <a href="<?php echo site_url('user/db_borrower');?>" class="nav-link active">
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
            <h1>Borrowers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('user/index');?>">Home</a></li>
              <li class="breadcrumb-item active">Borrowers</li>
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
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Borrower's Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Equipments</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
            <div class="card">
              <div class="card-header">
                <?php alert_message('status'); ?> 
                <h3 class="card-title">Detailed information of borrowers.</h3>
                <button class="btn btn-primary rounded-0" style="display: inline-block; float: right;" data-toggle="modal" data-target="#modal"><i class="fa-solid fa-plus"></i> Add a borrower</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th style="text-align:center;">Borrower ID</th>
                      <th style="text-align:center;">Name</th>
                      <th style="text-align:center;">Address/Office</th>
                      <th style="text-align:center;">Contact Number</th>
                      <th style="text-align:center;">Purpose</th>
                      <th style="text-align:center;">Remark</th>
                      <th style="text-align:center;">Prepared by</th>
                      <th style="text-align:center;">Date created</th>
                      <th style="text-align:center;">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $row) {  ?> 
                    <tr>
                    <td></td>
                    <td style="text-align:center;"><?php echo $row->borrower_id; ?></td>
                    <td style="text-align:center;"><?php echo $row->name; ?></td>
                    <td style="text-align:center;"><?php echo $row->office; ?></td>
                    <td style="text-align:center;"><?php echo $row->phone; ?></td>
                    <td style="text-align:center;"><?php echo $row->purpose; ?></td>
                    <td style="text-align:center;"><?php echo $row->remarks; ?></td>
                    <td style="text-align:center;"><?php echo $row->first_name; ?> <?php echo $row->middle_name; ?> <?php echo $row->last_name; ?></td>
                    <td style="text-align:center;"><?php echo $row->date_created; ?></td>
                    <td style="text-align:center;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#updatemodal<?=$row->borrower_id;?>" style="color: white;"><i class="fas fa-pencil-alt"></i></a> 
                    <a class="btn btn-danger btn-sm" style="color: white; display: inline-block;" data-toggle="modal" data-target="#deletemodal<?=$row->borrower_id;?>"><i class="fas fa-eraser"></i></a>
                    </td>
                    </tr> 
                    <?php } ?>
                    <tfoot>
                      <th></th>
                      <th style="text-align:center;">Borrower ID</th>
                      <th style="text-align:center;">Name</th>
                      <th style="text-align:center;">Address/Office</th>
                      <th style="text-align:center;">Contact Number</th>
                      <th style="text-align:center;">Purpose</th>
                      <th style="text-align:center;">Remark</th>
                      <th style="text-align:center;">Prepared by</th>
                      <th style="text-align:center;">Date created</th>
                      <th style="text-align:center;">Action</th>
                    </tfoot>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- /.card -->
          </div>
          <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card">
              <div class="card-header">
                <?php alert_message('status'); ?> 
                <h3 class="card-title">Assign equipments to the borrowers.</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal" action="<?php echo site_url('user/add_borrow');?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Borrower's Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <select name="b_name" id="b_name" class="form-control" required>
                   <option selected disabled>Select an option</option>
                   <?php foreach($data as $row) {?>
                   <option value='<?php echo $row->borrower_id; ?>'><?php echo $row->name ?></option>
                   <?php } ?>
                   </select>
                   </div>
                   </div>
                <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Assign Equipment <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <select name="b_equipment" id="b_equipment" class="form-control" required>
                   <option selected disabled>Select an option</option>
                   <?php foreach($item as $row) {?>
                    <?php if($row->quantity >= 1) {?>
                   <option value='<?php echo $row->item_id; ?>'><?php echo $row->equipment; ?></option>
                   <?php } ?>
                   <?php } ?>
                   </select>
                   <div id="detailed"></div>
                   </div>
                   </div>
                  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Equipment Quantity <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="item_quantity" id="item_quantity" class="form-control" readonly>
                   <input type="hidden" name="hid_name" id="hid_name" class="form-control" readonly>
                   <input type="hidden" name="hid_equipment" id="hid_equipment" class="form-control" readonly>
                   </div>
                   </div>
                 <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Quantity to borrow <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="number" name="b_quantity" class="form-control" required>
                   </div>
                   </div>
              <button type="submit" class="btn btn-primary" style="float: right;" >Assign Item</button>
            </form>
              <br><br>
              <div class="card-body">
              <table id="example3" class="table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th style="text-align:center;">Borrow ID</th>
                      <th style="text-align:center;">Borrower Name</th>
                      <th style="text-align:center;">Item Type</th>
                      <th style="text-align:center;">Equipment</th>
                      <th style="text-align:center;">Purpose</th>
                      <th style="text-align:center;">Remark</th>
                      <th style="text-align:center;">Quantity</th>
                      <th style="text-align:center;">Approved by</th>
                      <th style="text-align:center;">Date Borrowed</th>
                      <th style="text-align:center;">Action</th>


                    </tr>
                  </thead>
                  <tbody id="show_data"> 
                    <?php foreach($borrow as $row){?>
                    <tr>
                    <td></td>
                    <td style="text-align:center;"><?php echo $row->borrow_id;?></td>
                    <td style="text-align:center;"><?php echo $row->name;?></td>
                    <td style="text-align:center;"><?php echo $row->type;?></td>
                    <td style="text-align:center;"><?php echo $row->equipment;?></td>
                    <td style="text-align:center;"><?php echo $row->purpose;?></td>
                    <td style="text-align:center;"><?php echo $row->remarks; ?></td>
                    <td style="text-align:center;"><?php echo $row->b_quantity ?></td>
                    <td style="text-align:center;"><?php echo $row->first_name; ?> <?php echo $row->middle_name; ?> <?php echo $row->last_name; ?></td>
                    <td style="text-align:center;"><?php echo $row->date_created;?></td>
                    <td style="text-align:center;">
                    <?php if ($row->status == "unreturned") {?>
                    <a class="btn btn-success btn-sm" style="color: white; display: inline-block;" data-toggle="modal" data-target="#updatemodal1<?=$row->borrow_id;?>"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                    <a class="btn btn-danger btn-sm" style="color: white; display: inline-block;" data-toggle="modal" data-target="#deletemodal1<?=$row->borrow_id;?>"><i class="fas fa-eraser"></i></a>
                    <?php } else if($row->status == "returned") {?>
                    <a class="btn btn-secondary btn-sm" style="color: white; display: inline-block; pointer-events: none;" href="#" disabled tabindex="-1"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                    <a class="btn btn-secondary btn-sm" style="color: white; display: inline-block; pointer-events: none;" href="#" disabled tabindex="-1"><i class="fas fa-eraser"></i></a>
                  <?php } ?>
                    </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                      <th></th>
                      <th style="text-align:center;">Borrow ID</th>
                      <th style="text-align:center;">Borrower Name</th>
                      <th style="text-align:center;">Item Type</th>
                      <th style="text-align:center;">Equipment</th>
                      <th style="text-align:center;">Purpose</th>
                      <th style="text-align:center;">Remark</th>
                      <th style="text-align:center;">Quantity</th>
                      <th style="text-align:center;">Approved by</th>
                      <th style="text-align:center;">Date Borrowed</th>
                      <th style="text-align:center;">Action</th>
                    </tfoot>
                </table>
              </div>
              </div>
            </div>
              </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <!-- /Add Borrower -->
<div class="modal fade" id="modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a borrower</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="<?php echo site_url('user/add_borrower');?>" method="post" enctype="multipart/form-data">
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Borrower's Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="b_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="150" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Address/Office <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="b_address" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Contact Number <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type ="number" minlength="11" maxlength = "11"  onpaste="return false;" name="b_phone" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Purpose <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="b_purpose" maxlength="3000" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label"></label>
                   <div class="col-sm-10">
                   <input type="checkbox" name="terms" required>
                   <label style="text-align: justify;"> I hereby agree to return the items on time.
                   </label>
                   </div>
                   </div>     
                      <div class="modal-footer justify-content-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
            
              </form>
             </div>
            </div>
          <!-- /.modal-content -->         
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- /Update borrower -->
        <?php foreach($data as $row) {  ?> 
<div class="modal fade" id="updatemodal<?=$row->borrower_id;?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Update Borrower</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" action="<?php echo site_url('user/update_borrower/'.$row->borrower_id);?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="hid_name" value="<?php echo $row->name;?>">
                    <input type="hidden" name="hid_address" value="<?php echo $row->office;?>">
                    <input type="hidden" name="hid_phone" value="<?php echo $row->phone;?>"> 
                    <input type="hidden" name="hid_purpose" value="<?php echo $row->purpose;?>"> 
                    <input type="hidden" name="hid_remarks" value="<?php echo $row->remarks;?>"> 
                <div class="card-body">
                    <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Borrower's Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="b_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="150" class="form-control" value="<?php echo $row->name;?>" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Address/Office <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="b_address" value="<?php echo $row->office;?>" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Phone Number <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" minlength="11" maxlength = "11"  onpaste="return false;" name="b_phone" value="<?php echo $row->phone;?>" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Purpose <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" name="b_purpose" maxlength="3000" value="<?php echo $row->purpose;?>" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Remarks</label>
                   <div class="col-sm-10">
                   <input type="text" name="b_remarks" maxlength="3000" value="<?php echo $row->remarks;?>" class="form-control">
                   </div>
                   </div>
                   <input type="hidden" name="br_item" value="<?php echo $row->br_item;?>" class="form-control" required>     
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
      <?php } ?>

        <!-- /Update borrow -->
        <?php foreach($borrow as $row) {  ?> 
<div class="modal fade" id="updatemodal1<?=$row->borrow_id;?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Update item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
               <form class="form-horizontal" action="<?php echo site_url('user/update_borrow/'.$row->borrow_id);?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Borrower's Name</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->name; ?>" name="b_name" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Equipment Name</label>
                   <div class="col-sm-10">
                   <input type="hidden" value="<?php echo $row->borrower_id; ?>" name="borrower_id" class="form-control">
                   <input type="text" value="<?php echo $row->equipment; ?>" name="item_equipment" class="form-control" readonly>
                   <input type="hidden" value="<?php echo $row->item_id; ?>" name="item_id" class="form-control" readonly>
                   <input type="hidden" value="<?php echo $row->remarks; ?>" name="hid_remarks" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Equipment Quantity</label>
                   <div class="col-sm-10">
                   <input type="number" value="<?php echo $row->quantity; ?>" name="item_quantity" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Borrowed Quantity</label>
                   <div class="col-sm-10">
                   <input type="number" value="<?php echo $row->b_quantity; ?>" name="b_quantity" class="form-control" readonly>
                   <input type="hidden" value="<?php echo $row->original; ?>" name="original" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Increase (+)/Decrease (-)</label>
                   <div class="col-sm-10">
                   <input type="number" name="increase" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Remark</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->remarks; ?>" maxlength="3000" name="b_remarks" class="form-control">
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
      <?php } ?>

  <!-- /.delete borrow -->
  <?php foreach($borrow as $row) {  ?>
   <div class="modal fade" id="deletemodal1<?=$row->borrow_id;?>">
        <div class="modal-dialog">
          <form class="form-horizontal" action="<?php echo base_url('user/delete_borrow/'.$row->borrow_id); ?>" method="post"> 
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                  <div style="text-align: center;"><p>Are you sure you want to remove this item?</p></div>
                  <input type="hidden" name="b_quantity" value="<?php echo $row->b_quantity; ?>" class="form-control">
                  <input type="hidden" name="b_equipment" value="<?php echo $row->item_id; ?>" class="form-control">
                  <input type="hidden" name="b_name" value="<?php echo $row->borrower_id; ?>" class="form-control">
                  <input type="hidden" name="hid_equipment" value="<?php echo $row->equipment; ?>" class="form-control">
                  <input type="hidden" name="hid_name" value="<?php echo $row->name; ?>" class="form-control">
                  </div>
                  <div class="modal-footer justify-content-right">
                  <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
            </div>
     
          </div>
          <!-- /.modal-content -->
              
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
   <?php } ?>

    <!-- /.info. modal -->
  <?php foreach($item as $row) {  ?>
   <div class="modal fade" id="infomodal<?=$row->item_id;?>">
        <div class="modal-dialog modal-lg">
          <div class="form-horizontal"> 
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Equipment Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                   <div class="form-horizontal">
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Equipment Image</label>
                   <div class="col-sm-10">
                   <img src="<?php echo base_url().'assets/img/'.$row->item_image ?>" style="font-weight: bold; width: 2in; height:2in; display: block; margin-left: auto; margin-right: auto;" />
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Name</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->equipment;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Type</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->type;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Description</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->description;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Serial</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->serial;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Color</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->color;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Unit</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->unit;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Size</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->size;?>" class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Remark</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->remark;?>" class="form-control" readonly>
                   </div>
                   </div>
                  </div>
                  <div class="modal-footer justify-content-right">
            </div>
            </div>
            </div>
     
          </div>
          <!-- /.modal-content -->
              
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
   <?php } ?>

   <!-- /.delete borrower -->
  <?php foreach($data as $row) {  ?>
   <div class="modal fade" id="deletemodal<?=$row->borrower_id;?>">
        <div class="modal-dialog">
          <form class="form-horizontal" action="<?php echo base_url('user/delete_borrower/'.$row->borrower_id); ?>" method="post"> 
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Borrower</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                  <div style="text-align: center;"><p>Are you sure you want to remove this user?</p></div>
                  <input type="hidden" name="br_item" value="<?php echo $row->br_item; ?>" class="form-control">
                  <input type="hidden" name="b_name" value="<?php echo $row->name; ?>" class="form-control">
                  </div>
                  <div class="modal-footer justify-content-right">
                  <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
            </div>
     
          </div>
          <!-- /.modal-content -->
              
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
   <?php } ?>


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
  $('#b_equipment').on('change', function() {
  equip = this.value;
  var html = '';
  <?php foreach($item as $row){?>
  if (equip == <?php echo $row->item_id;?>)
  {
  html += '<a data-toggle="modal" data-target="#infomodal<?=$row->item_id;?>" style="float:right; color:blue; cursor: pointer;"><i class="fa-solid fa-circle-info"></i> Details</a>';
  }
  <?php } ?>
  $('#detailed').html(html);
  });
  $('#b_name').on('change', function() {
  //document.getElementById("b_id").value = this.value; 
   borrower = this.value;
    var html = '';
    <?php foreach($borrow as $row){?>
    equipment = "<?php echo $row->equipment ?>";
    date_borrowed = "<?php echo $row->date_created ?>";
    borrower_name = "<?php echo $row->name;?>";
    prepared_name = "<?php echo $row->first_name; ?> <?php echo $row->middle_name; ?> <?php echo $row->last_name; ?>";
    purpose = "<?php echo $row->purpose;?>";
  if (borrower == <?php echo $row->borrower_id;?>)
                  {

  html +=           '<tr>'+
                    '<td style="text-align:center;">'+<?php echo $row->borrow_id;?>+'</td>'+
                    '<td style="text-align:center;">'+borrower_name+'</td>'+
                    '<td style="text-align:center;">'+equipment+'</td>'+
                    '<td style="text-align:center;">'+purpose+'</td>'+
                    '<td style="text-align:center;">'+<?php echo $row->b_quantity;?>+'</td>'+
                    '<td style="text-align:center;">'+prepared_name+'</td>'+
                    '<td style="text-align:center;">'+date_borrowed+'</td>'+
                    '<td style="text-align:center;">'+
                    '<a class="btn btn-success btn-sm" style="color: white; display: inline-block;" data-toggle="modal" data-target="#updatemodal1<?=$row->borrow_id;?>"><i class="fas fa-pencil-alt"></i></a>&nbsp;'+
                    '<a class="btn btn-danger btn-sm" style="color: white; display: inline-block;" data-toggle="modal" data-target="#deletemodal1<?=$row->borrow_id;?>"><i class="fas fa-eraser"></i></a>'+
                    '</td>'+
                    '</tr>';
                  }
  <?php } ?>
  $('#show_data').html(html);
  });
</script>

<script>
  $('#b_equipment').on('change', function() {
  //document.getElementById("b_id").value = this.value; 
   equip = this.value;
   var html = '';
  <?php foreach($item as $row){?>
    quantity = "<?php echo $row->quantity ?>";
    equip_name = "<?php echo $row->equipment ?>";
  if (equip == <?php echo $row->item_id;?>)
                  {
                      document.getElementById("item_quantity").value = quantity;
                      document.getElementById("hid_equipment").value = equip_name;
                  }
  <?php } ?>
  });

  $('#b_name').on('change', function() {
  //document.getElementById("b_id").value = this.value; 
   equip = this.value;
   var html = '';
  <?php foreach($data as $row){?>
    bname = "<?php echo $row->name ?>";
  if (equip == <?php echo $row->borrower_id;?>)
                  {
                      document.getElementById("hid_name").value = bname;
                  }
  <?php } ?>
  });
</script>
<script>
  $(function () {
   var t = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "order": [[2, 'asc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          initComplete: function () {
            this.api().columns([1,2,3,4,5,6,7,8]).every( function () {
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
    });
   t.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   t.on('order.dt search.dt', function () {
     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           t.cell(cell).invalidate('dom');
     });
   }).draw();
      var t1 = $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "order": [[1, 'desc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      initComplete: function () {
            this.api().columns([1,2,3,4,5,6,7,8,9]).every( function () {
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

    });
      t1.buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
      t1.on('order.dt search.dt', function () {
      t1.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           t1.cell(cell).invalidate('dom');
     });
    }).draw();
      $('a[data-toggle="pill"]').on('shown.bs.tab', function(e){
      $.fn.dataTable.tables( {visible: true, api: true} )
     .responsive.recalc()
     .columns.adjust();
    });  
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
