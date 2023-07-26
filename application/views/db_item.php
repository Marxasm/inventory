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
            <a href="<?php echo site_url('user/db_item');?>" class="nav-link active">
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
            <h1>Items</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('user/index');?>">Home</a></li>
              <li class="breadcrumb-item active">Items</li>
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
                <h3 class="card-title">Food and non-food items available within the inventory.</h3>
                 <button class="btn btn-warning rounded-0" style="display: inline-block; float: right;" data-toggle="modal" data-target="#typemodal"><i class="fa-solid fa-plus"></i> Add item type </button><button class="btn btn-primary rounded-0" style="display: inline-block; float: right;" data-toggle="modal" data-target="#modal"><i class="fa-solid fa-plus"></i> Add item</button>



              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th style="text-align:center;">Item ID</th>
                      <th style="text-align:center;">Item Image</th>
                      <th style="text-align:center;">Item Type</th>
                      <th style="text-align:center;">Equipment</th>
                      <th style="text-align:center;">Description/Brand</th>
                      <th style="text-align:center;">Serial Number</th>
                      <th style="text-align:center;">Color</th>
                      <th style="text-align:center;">Unit</th>
                      <th style="text-align:center;">Quantity</th>
                      <th style="text-align:center;">Sizes</th>
                      <th style="text-align:center;">Remarks</th>
                      <th style="text-align:center;">Status</th>
                      <th style="text-align:center;">Prepared by</th>
                      <th style="text-align:center;">Date created</th>
                      <th style="text-align:center;">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $row) {  ?> 
                    <tr>
                    <td></td>
                    <td style="text-align:center;"><?php echo $row->item_id; ?></td>
                    <td style="text-align:center;"><img src="<?php echo base_url().'assets/img/'.$row->item_image ?>" alt="No Image" style="font-weight: bold; width: 2in; height:2in;"/></td>
                    <td style="text-align:center;"><?php echo $row->type; ?></td>
                    <td style="text-align:center;"><?php echo $row->equipment; ?></td>
                    <td style="text-align:center;"><?php echo $row->description; ?></td>
                    <td style="text-align:center;"><?php echo $row->serial; ?></td>
                    <td style="text-align:center;"><?php echo $row->color; ?></td>
                    <td style="text-align:center;"><?php echo $row->unit; ?></td>
                    <td style="text-align:center;"><?php echo $row->quantity; ?></td>
                    <td style="text-align:center;"><?php echo $row->size; ?></td>
                    <td style="text-align:center;"><?php echo $row->remark; ?></td>
                    <td style="text-align:center;">
                    <?php if($row->quantity >= 1) { ?><div class="badge badge-success">Available</div> <?php } elseif($row->quantity <= 0) { ?><div class="badge badge-danger">Unavailable</div><?php } ?>
                    </td>
                    <td style="text-align:center;"><?php echo $row->first_name; ?> <?php echo $row->middle_name; ?> <?php echo $row->last_name; ?></td>
                    <td style="text-align:center;"><?php echo $row->date_created; ?></td>
                    <td style="text-align:center;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#updatemodal<?=$row->item_id;?>" style="color: white;"><i class="fas fa-pencil-alt"></i></a> 
                    <a class="btn btn-danger btn-sm" style="color: white; display: inline-block;" data-toggle="modal" data-target="#deletemodal<?=$row->item_id;?>"><i class="fas fa-eraser"></i></a>
                    </td>
                    </tr> 
                    <?php } ?>
                    <tfoot>
                      <th></th>
                      <th style="text-align:center;">Item ID</th>
                      <th style="text-align:center;">Item Image</th>
                      <th style="text-align:center;">Item Type</th>
                      <th style="text-align:center;">Equipment</th>
                      <th style="text-align:center;">Description/Brand</th>
                      <th style="text-align:center;">Serial Number</th>
                      <th style="text-align:center;">Color</th>
                      <th style="text-align:center;">Unit</th>
                      <th style="text-align:center;">Quantity</th>
                      <th style="text-align:center;">Sizes</th>
                      <th style="text-align:center;">Remarks</th>
                      <th style="text-align:center;">Status</th>
                      <th style="text-align:center;">Prepared by</th>
                      <th style="text-align:center;">Date created</th>
                      <th style="text-align:center;">Action</th>
                  </tbody>
                </table>
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
  <!-- /Add Item -->
<div class="modal fade" id="typemodal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Add item type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" action="<?php echo site_url('user/add_type');?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Item Type <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_type" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Available Item Type</label>
                   <div class="col-sm-10">
                   <select class="form-control" readonly>
                   <option selected disabled>Item Types</option>
                   <?php foreach($type as $row) {?>
                   <option disabled><?php echo $row->item_type; ?></option>
                   <?php } ?>
                   </select>
                   </div>
                   </div>
                </div>
                <!-- /.card-body -->        
                      <div class="modal-footer justify-content-right">
                      <button type="submit" class="btn btn-primary">Add</button>
                      </div>
              
              </form>
             </div>
            </div>
          <!-- /.modal-content -->         
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


        <!-- /Add Item -->
<div class="modal fade" id="modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Add an item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" action="<?php echo site_url('user/add_item');?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Item Type <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <select name="item_type" class="form-control" required> 
                   <option selected disabled>Select an option</option>
                   <?php foreach($type as $row) {?>
                   <option value="<?php echo $row->item_type; ?>"><?php echo $row->item_type; ?></option>
                   <?php } ?>
                   </select>
                   </select>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Equipment Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_equipment" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Description/Brand</label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_description" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Serial Number</label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_serial" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Item Image</label>
                   <div class="col-sm-10">
                   <input type="file" maxlength="500" name="item_image" accept="image/*" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Color</label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_color" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Unit</label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_unit" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Quantity <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="number" name="item_quantity" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Sizes</label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="150" name="item_sizes" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Remarks</label>
                   <div class="col-sm-10">
                   <input type="text" maxlength="3000" name="item_remarks" class="form-control">
                   </div>
                   </div>

                </div>
                <!-- /.card-body -->        
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


        <!-- /Update Item -->
        <?php foreach($data as $row) {  ?> 
<div class="modal fade" id="updatemodal<?=$row->item_id;?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Update item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" action="<?php echo site_url('user/update_item/'.$row->item_id);?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="hidden" name="hid_type" value="<?php echo $row->type; ?>">
                  <input type="hidden" name="hid_equipment" value="<?php echo $row->equipment; ?>">
                  <input type="hidden" name="hid_description" value="<?php echo $row->description; ?>">
                  <input type="hidden" name="hid_serial" value="<?php echo $row->serial; ?>">
                  <input type="hidden" name="hid_image1" value="<?php echo $row->item_image; ?>">
                  <input type="hidden" name="hid_color" value="<?php echo $row->color; ?>">
                  <input type="hidden" name="hid_unit" value="<?php echo $row->unit; ?>">
                  <input type="hidden" name="hid_quantity" value="<?php echo $row->quantity; ?>">
                  <input type="hidden" name="hid_sizes" value="<?php echo $row->size; ?>">
                  <input type="hidden" name="hid_remarks" value="<?php echo $row->remark; ?>">
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Item Type <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <select name="item_type" id="item_type" class="form-control" required> 
                   <?php foreach($type as $row1) { ?>
                   <option <?=$row1->item_type == $row->type ? ' selected="selected"' : '';?>><?php echo $row1->item_type; ?></option>
                   <?php } ?>
                   </select>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Equipment Name <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->equipment; ?>" maxlength="150" name="item_equipment" class="form-control" required>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Description/Brand</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->description; ?>" maxlength="1000" name="item_description" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Serial Number</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->serial; ?>" maxlength="150" name="item_serial" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Item Image</label>
                   <div class="col-sm-10">
                   <input type="file" name="item_image" accept="image/*" class="form-control">
                   <input type="hidden" name="item_image1" maxlength="500" value="<?php echo $row->item_image; ?>" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Color</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->color; ?>" maxlength="150" name="item_color" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Unit</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->unit; ?>" maxlength="150" name="item_unit" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Original Quantity</label>
                   <div class="col-sm-10">
                   <input type="text" name="original" value="<?php echo $row->original; ?>"  class="form-control" readonly>
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Quantity <span style="color:red">*</span></label>
                   <div class="col-sm-10">
                   <input type="number" value="<?php echo $row->quantity; ?>" name="item_quantity" class="form-control" required>
                   <input type="hidden" value="<?php echo $row->quantity; ?>" name="new_quantity" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Sizes</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->size; ?>" maxlength="150" name="item_sizes" class="form-control">
                   </div>
                   </div>
                   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Remarks</label>
                   <div class="col-sm-10">
                   <input type="text" value="<?php echo $row->remark; ?>" maxlength="3000" name="item_remarks" class="form-control">
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

      <!-- /.delete item -->
  <?php foreach($data as $row) {  ?>
   <div class="modal fade" id="deletemodal<?=$row->item_id;?>">
        <div class="modal-dialog">
          <form class="form-horizontal" action="<?php echo base_url('user/delete_item/'.$row->item_id); ?>" method="post"> 
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Item</h4>
              <input type="hidden" value="<?php echo $row->quantity; ?>" name="item_quantity" class="form-control">
              <input type="hidden" name="original" value="<?php echo $row->original; ?>"  class="form-control">
              <input type="hidden" name="item_equipment" value="<?php echo $row->equipment; ?>"  class="form-control">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                  <div style="text-align: center;"><p>Are you sure you want to delete this item?</p></div>
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
  <script>
  $('#item_type').on('change', function() {
   equip = this.value;
   var html = '';
  <?php foreach($type as $row){?>
  item_type = "<?php echo $row->item_type ?>";
  if (equip == <?php echo $row->type_id;?>)
                  {
                      document.getElementById("type_name").value = item_type;
                  }
  <?php } ?>
  });


</script>
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
<script>
  $(function () {
    var t = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "order": [[14, 'desc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          initComplete: function () {
            this.api().columns([1,2,3,4,5,6,7,8,9, 10,11,12,13]).every( function () {
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
        $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

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
