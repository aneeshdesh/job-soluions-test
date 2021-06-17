<?php 
session_start();
//print_r($_SESSION);
if(!isset($_SESSION['Id'])){
	header('Location: ./logout.php' );
}
require('./phpincludes/connection.php');

if($_SESSION['AccessLevel']=='Employee'){
	$query = "SELECT * FROM tbl_tasks where AssignedTo=".$_SESSION['Id']." order by Id DESC"; 
}else if($_SESSION['AccessLevel']=='Manager'){
	$query = "SELECT * FROM tbl_tasks order by Id DESC"; 
}
$result = mysqli_query($connection, $query); 
$numrow = mysqli_num_rows($result); 
//exit();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Solutions Test | List Of Tasks</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	  
        <?php include('./inner-header.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List Of Task's <small></small></h3>
              </div>

              <!--<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <!--<p class="text-muted font-13 m-b-30">
                      DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p>-->
                    <table id="datatable-buttons1" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Action</th>
                          <th>Task Id</th>
                          <th>Task Description</th>                          
                          <th>Due date</th>
                           <?php if($_SESSION['AccessLevel']=='Manager'){ ?>
                            <th>Assigned To</th>
                            <?php } ?>
                          <th>Status</th>
                        </tr>
                      </thead>


                      <tbody>
					  <?php if($numrow > 0){ 
						while($row = mysqli_fetch_assoc($result)){
					  ?>
                        <tr>
                           <td><a href="./edit-task.php?val=<?php echo base64_encode($row['Id']); ?>" title="Edit Tasks" alt="Edit Tasks"><i class="fa fa-pencil"></i></a> | <a href="./delete-task.php?val=<?php echo base64_encode($row['Id']); ?>" title="Delete Tasks" alt="Delete Tasks" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>
                          <td><?php echo $row['Id']; ?></td>
                          <td><?php echo $row['TaskDescription']; ?></td>
                          <td><?php echo date('d-M-Y',strtotime($row['TaskDueDate'])); ?></td>   
                          <?php if($_SESSION['AccessLevel']=='Manager'){ ?>
                            <td>
                            <?php 
                            $queryuser = "SELECT Id,Name FROM tbl_users where Id=".$row['AssignedTo']; 
							$resultuser = mysqli_query($connection, $queryuser);
							$rowuser = mysqli_fetch_assoc($resultuser);
							echo $rowuser['Name'];
                           ?>
                            </td>
                            <?php } ?>    
						  <td><?php echo $row['Status']; ?></td>
                        </tr>
					  <?php }}else{ ?>
						<tr><td colspan='10'>No Participants Found</td></tr>				  
					  <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

              
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

         <!-- footer content -->
        <?php include('./inner-footer.php'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
	<script>
	var table;
	//table.destroy();
	table = $('#datatable-buttons1').DataTable({
	responsive: true,  
	order: [[0, 'desc']],  
});
	// $(document).ready(function () {
	//	$('#datatable-buttons').DataTable({order: [[0, 'desc']]});
	
	 
	// $('#datatable-buttons').DataTable( {

//searching: false,
//destroy: true,
//} );
// });

//$(document).ready( function() {
  //  $('#datatable-buttons').dataTable({
        /* No ordering applied by DataTables during initialisation */
    //    "order": []
    //});
//})
</script>

  </body>
</html>