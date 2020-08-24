<?php
require_once "objects/objects.php";
session_start();
if(!isset($_SESSION['logged_in'])){
	header('location: index.php');
}
$data=$member->member_read();
$rows=$member->CountRows();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gym Management System - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
<!--Include The Navabr-->
<?php include_once "public/include/navbar.php";   ?>
<!--End of Navbar Include--> 
<div id="wrapper">

  <!--Inlcude the Sidebar-->
<?php   require_once "public/include/sidebar.php";  ?>
  <!--End of Sidebar include-->
   
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <!--Icons Main Dashboard-->
        <?php include_once "public/include/icons_dashboard.php";    ?>
        <hr>
        <!--End of Icons Main Dashboard-->
        <!-- DataTables Example -->
        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#AddMember"><i class="fas fa-plus"></i>  ADD MEMBER </a>
        <hr>
        <div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Joining</th>
                    <th>Contact No</th>
                    <th>Fee</th>
                    <th>Address</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($rows > 0 )
                {
                  while ($row = $data->fetch(PDO::FETCH_ASSOC))
                  {
           
                      extract($row);
           
                      echo "<tr>";
                          echo "<td>{$mem_id}</td>";
                          echo "<td>{$Name}</td>";
                          echo "<td>{$Gender}</td>";
                          echo "<td>{$Date_of_joining}</td>";
                          echo "<td>{$Contact_No}</td>"; 
                          echo "<td>{$Fee}</td>";    
                          echo "<td>{$Address}</td>";
                          echo "<td><a  href='#' update_id='{$mem_id}' class='btn  update_object'><i class='fas fa-edit'></i></td>";
                          echo "<td><a  href='#' delete_id='{$mem_id}' class='btn  delete_object'><i class='fas fa-trash'></i></td>";
                      echo "</tr>";
      
     
                  }

                } 
                ?>   
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <!--Add Member Modal-->
 <div class="modal fade" id="AddMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body">
    <form action="member_resp.php" method="POST" class="add_member">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="name" name="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
          <label for="contact">Contact No</label>
          <input type="contact" name="contact" class="form-control" id="contact" placeholder="Contact No">
        </div>
      </div>
      <div class="form-group">
        <label for="Gender">Gender</label>
        <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
      <label class="form-check-label" for="Male">
        Male
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
      <label class="form-check-label" for="Female">
        Female
      </label>
    </div>
    </div>
      <div class="form-group">
        <label for="date">Date of Joining</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Apartment, studio, or floor">
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="fee">Fee</label>
          <input type="text" class="form-control" id="fee" name="fee">
        </div>
      </div> 
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="Address">Address</label>
          <input type="text" class="form-control" id="Address" name="Address">
        </div>
      </div> 
      <button class="btn btn-primary btn_add_member float-right">Add Recored</button>
  </form>
  </div>
  </div>
  </div>
  </div>
  <!--End of Add Member Modal-->
  <!--Edit Member Modal-->
 <div class="modal fade" id="UpdateMember" tabindex="-1" role="dialog" aria-labelledby="UpdateMember" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateMember">UPDATE MEMBER</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body update_modal_body">
      <button class="btn btn-primary  float-right" id="btn_update_member">UPDDATE RECORED</button>

  </div>
  </div>
  </div>
  </div>
  <!--End of Edit Member Modal-->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="public/js/sb-admin.min.js"></script>
  <!-- Demo scripts for this page-->
  <script src="public/js/demo/datatables-demo.js"></script>
  <script src="public/js/demo/chart-area-demo.js"></script>
  <!--Our Own JS File-->
 <script src="public/js/script.js"></script>
   <!--Form Validations JS   -->
   <script src="public/js/form_validations.js"></script>
 <!--Add Validation Plugin-->
 <script src="public/js/jquery.validate.js"></script>
</body>

</html>
