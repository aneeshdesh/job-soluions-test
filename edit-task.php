<?php 
session_start();
if(!isset($_SESSION['Id'])){
	header('Location: ./logout.php' );
}
require('./phpincludes/connection.php');
//print_r($_SESSION);

//exit();
?>
<?php if(isset($_GET['val']) && $_GET['val']!=""){ 

$query = "SELECT * FROM tbl_tasks where Id=".base64_decode($_GET['val']); 

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

 } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Job Solutions Test | Edit Task</title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  
   <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
	 <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">

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
              <h3>Edit Task</h3>
            </div>

            <!--<div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>-->
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
              
                <div class="x_content">
                  <form class="" action="./edit-task-action.php" method="post" novalidate data-parsley-validate>
                    <!--<p>For alternative validation library <code>parsleyJS</code> check out in the <a
                        href="form.html">form page</a>
                    </p>-->
                    <input class="form-control"  name="Id"
                          placeholder="" required="required" type="hidden" value="<?php echo base64_decode($_GET['val']);  ?>" />  
					<?php if(isset($_SESSION['errormsg'])){ ?>
						<p style="color:red;font-size:14px;font-weight:700;text-align:center"><?php echo $_SESSION['errormsg']; ?></p>
					<?php unset($_SESSION['errormsg']); } ?>
                    <span class="section" style="color:red;font-size:12px">*All Fields are Mandatory</span>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Task Description<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <textarea id="TaskDescription" name="TaskDescription" class="form-control"><?php echo $row['TaskDescription']; ?></textarea>
                      </div>
                    </div>
					
					<div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Task Due Date<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" class='date' type="date" name="TaskDueDate" required='required' value="<?php echo $row['TaskDueDate']; ?>"></div>
                    </div>
                  <?php if($_SESSION['AccessLevel']=='Manager'){ ?>
                      <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Assigned To<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
						<?php 
                            $query1 = "SELECT * FROM tbl_users where Status='Active' and UserType='Employee'"; 
                            $result1 = mysqli_query($connection, $query1);
                            
                          ?>
                        <select class="form-control" name="AssignedTo"  required>
                            <option value="">Choose Assigned To</option>
                            <?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
							<option value="<?php echo $row1['Id']; ?>" <?php if($row['AssignedTo']==$row1['Id']){ ?>Selected<?php } ?>><?php echo $row1['Name']; ?></option>
				            <?php } ?>					   
                          </select>
						  </div>
                    </div>
                      <?php } ?>
                    
					<div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
						
                        <select class="form-control" name="Status"  required>
                            <option value="">Choose Status</option>
							<option value="Pending" <?php if($row['Status']=='Pending'){ ?>Selected<?php } ?>>Pending</option>
							<option value="InProgress" <?php if($row['Status']=='InProgress'){ ?>Selected<?php } ?>>InProgress</option>
							<option value="Completed" <?php if($row['Status']=='Completed'){ ?>Selected<?php } ?>>Completed</option>						   
                          </select>
						  </div>
                    </div>
                    
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Submit</button>
                    <button type='reset' class="btn btn-success">Reset</button>
                        </div>
                      </div>
                    </div>
                  </form>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="vendors/validator/multifield.js"></script>
  <script src="vendors/validator/validator.js"></script>

  <script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function (e) {
      var submit = true,
        validatorResult = validator.checkAll(this);
      console.log(validatorResult);
      return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function (e) {
      validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function () {
      validator.settings.alerts = !this.checked;
      if (this.checked)
        $('form .alert').remove();
    }).prop('checked', false);
  </script>

  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="vendors/nprogress/nprogress.js"></script>
  <!-- validator -->
  <!-- <script src="vendors/validator/validator.js"></script> -->
  <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
<!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>
  
  

</body>

</html>