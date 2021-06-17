<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Solutions Test | Login</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  <?php if(isset($_SESSION['errormsg'])){ ?>
			<span style="color:red;font-size:14px;font-weight:700"><?php echo $_SESSION['errormsg']; ?></span>
		  <?php } ?>
            <form name="frmlogin" method="POST" action="./login-action.php" id="frmlogin">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="UserId" required="required" name="UserId" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" name="Password" />
              </div>
              <div>
               <!-- <a class="btn btn-default submit" href="index.html">Log in</a>-->
			   <button type='submit' class="btn btn-default submit" name="cmdlogin" >Log in</button>
               <!-- <a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
               <!-- <br />-->

                <div>
                  <!--<h1><i class="fa fa-paw"></i> Ministry of AYUSH</h1>
				  <h1><img src='images/Ministry-of-AYUSH-logo-1-2.jpg' /></h1>-->
                  <p>©<?php echo date('Y'); ?> All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <?php /* <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Ministry of AYUSH</h1>
                  <p>©<?php echo date('Y'); ?> All Rights Reserved. Ministry of AYUSH</p>
                </div>
              </div>
            </form>
          </section>
        </div> */?>
      </div>
    </div>
  </body>
</html>
