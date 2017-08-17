<?php

session_start();

ob_start();

$session=$_SESSION['admin_session'];

if($session!=null)

{

header("location:scrapping_data.php");

}

include "db.php";

if(isset($_REQUEST['login']))

{

 $user_id=$_REQUEST['user_id'];

 $user_password=$_REQUEST['user_password'];

 $date=date('Y-m-d');

 $sel_email=mysql_query("select * from admin where username='$user_id' and password='$user_password'");

 if($sel_email_r=mysql_fetch_array($sel_email))

 {
  $id=$sel_email_r['id'];
    $_SESSION['admin_session']=$id;
 
    mysql_query("update admin set ip_address='".$_SERVER['REMOTE_ADDR']."',login_date='$date' where username='$user_id' and password='$user_password'");

    header("location:scrapping_data.php");

 }

 else

 {

    echo '<script>alert("Your Username and Password is not correct !")</script>';

 }   

}

?>

<?PHP

if(isset($_REQUEST['upd_pass']))

{

    

    

 $forgot_email=$_REQUEST['forgot_email'];

$forgot_sql= mysql_query("select * from admin where username='$forgot_email'") ;  

$forgot_fetch=mysql_fetch_array($forgot_sql);

$forgot_password=$forgot_fetch['password'];

if($forgot_email==$forgot_fetch['username'])

{

    //data

$msg = "Your Email Password: "  .$forgot_password ."<br>\n";



//Headers

$headers  = "MIME-Version: 1.0\r\n";

$headers .= "Content-type: text/html; charset=UTF-8\r\n";

$headers .= "From:Admin Panel <info@hawkscode.com>";





//send for each mail



   mail($forgot_email, "Your forgot password from Admin Panel", $msg, $headers);

    echo '<script>alert("Please check Your Email!!");</script>';

   }

   

   else

   {    

 echo '<script>alert("Invalid Email!!");</script>';

    }



}



?>

<!DOCTYPE html>

<html lang="en">



 

<head>

    <meta charset="utf-8">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="ThemeBucket">

    <link rel="shortcut icon" href="images/favicon.html">



    <title>Login</title>



    <!--Core CSS -->

    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-reset.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />



    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">

    <link href="css/style-responsive.css" rel="stylesheet" />



    <!-- Just for debugging purposes. Don't actually copy this line! -->

    <!--[if lt IE 9]>

    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

</head>



  <body class="login-body">



    <div class="container">



      <form class="form-signin" action="" method="post" onsubmit="return checkForm(this);" >

        <h2 class="form-signin-heading">Sign in </h2>

        <div class="login-wrap">

            <div class="user-login-info">

                <input type="text" name="user_id" class="form-control" placeholder="User ID" autofocus>

                <input type="password" name="user_password" class="form-control" placeholder="Password">

            </div>

            <label class="checkbox">

                <input type="checkbox" value="remember-me"> Remember me

                <span class="pull-right">

                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>



                </span>

            </label>

            <input class="btn btn-lg btn-login btn-block" name="login" type="submit" value="Sign in"/>



           <!-- <div class="registration">

                Don't have an account yet?

                <a class="" href="registration.html">

                    Create an account

                </a>

            </div>-->



        </div>

</form>

<script type="text/javascript">



  function checkForm(form) 

  {

    if(form.user_id.value == "") {

      alert("Error: Username cannot be blank!");

      form.user_id.focus();

      return false;

    }



      /*if(form.user_password.value.length < 6) {

        alert("Error: Password must contain at least six characters!");

        form.user_password.focus();

        return false;

      }*/

    return true;

  }



</script>

       <!-- Modal -->

          <form method="post">

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">

              <div class="modal-dialog">

                  <div class="modal-content">

                      <div class="modal-header">

                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                          <h4 class="modal-title">Forgot Password ?</h4>

                      </div>

                      <div class="modal-body">

                          <p>Enter your e-mail address below to reset your password.</p>

                          <input type="text" required="" name="forgot_email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">



                      </div>

                      <div class="modal-footer">

                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>

                          <button class="btn btn-success" type="submit" name="upd_pass">Submit</button>

                      </div>

                  </div>

              </div>

          </div>

          <!-- modal -->



      </form>



    </div>







    <!-- Placed js at the end of the document so the pages load faster -->



    <!--Core js-->

    <script src="js/jquery.js"></script>

    <script src="bs3/js/bootstrap.min.js"></script>



  </body>



 

</html>



