<?php

session_start();

ob_start();

$session=$_SESSION['admin_session'];

if($session == null)

{

     echo "<script>window.locaton.href='index.php'</script>";

}

?>

<?php

session_start();

ob_start();

$admin_session=$_SESSION['admin_session'];

if($admin_session==null)

{

    header("Location:index.php");

}

?>

<?php include "db.php"; ?>

<?php

if(isset($_REQUEST['upd_pass']))

{



$new_pass=$_REQUEST['npass'];

$mysql=mysql_query("select * from admin where id='$admin_session'");

$fetch=mysql_fetch_array($mysql);



if($fetch['password']==$_REQUEST['opass'] && $_REQUEST['npass']==$_REQUEST['cpass'])

{

 mysql_query("update admin set password='$new_pass' where id='$admin_session'") ; 

 echo '<script>alert("Your Password has successfully changed")</script>';  

}

else

{

     echo '<script>alert("Your Password not matched !")</script>';  

}

}

?>

<?php

$sel_pro=mysql_query("select * from admin where id='$session'");

$sel_pro_r=mysql_fetch_array($sel_pro);

?>











<!DOCTYPE html>

<html lang="en">



 

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content=" Admin">

    <link rel="shortcut icon" href="images/favicon.html">

    <title>Admin Panal</title>

    <!--Core CSS -->

    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">

    <link href="js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">

    <link href="css/bootstrap-reset.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">

    <link href="css/clndr.css" rel="stylesheet">

    <!--clock css-->

    <link href="js/css3clock/css/style.css" rel="stylesheet">

    <!--Morris Chart CSS -->

    <link rel="stylesheet" href="js/morris-chart/morris.css">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">

    <link href="css/style-responsive.css" rel="stylesheet"/>

    

</head>

<body>

<section id="container">

<!--header start-->

<header class="header fixed-top clearfix">

<!--logo start-->

<div class="brand">



    <a href="my_profile.php" class="logo">

        <img src="http://dev.hawkscode.co.uk/amazon-scrape/img/amazon_logo_RGB.jpg" alt="" style="max-height: 89px;padding: -4px;margin-top: -29px;margin-left: -25px;">

    </a>

    <div class="sidebar-toggle-box">

        <div class="fa fa-bars"></div>

    </div>

</div>

<!--logo end-->



 

<div class="top-nav clearfix">

    <!--search & user info start-->

    <ul class="nav pull-right top-menu">

         

        <!-- user login dropdown start-->

        <li class="dropdown">

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

               <?php if($sel_pro_r['pic']!=null)

            {

                ?>

                 <img alt="" src="img/admin_pic/<?php echo $sel_pro_r['pic'] ?>">

                <?php

                }

                else

                {

                    ?>

                     <img alt="" src="images/avatar1_small.jpg">

                    <?php

            } ?>

               

                <span class="username"><?php echo $sel_pro_r['name']; ?></span>

                <b class="caret"></b>

            </a>

            <ul class="dropdown-menu extended logout">

                <li><a href="my_profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>

                <li><a href="#myModal-2" data-toggle="modal"><i class="fa fa-cog"></i>Change Password</a></li>

                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>

            </ul>

        </li>

        <!-- user login dropdown end -->

        

    </ul>

    <!--search & user info end-->

</div>

</header>

<!--header end-->













 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade">

 

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times-circle"></i></button>

                                        <h4 class="modal-title">Change Password</h4>

                                    </div>

                                    <div class="modal-body">

                                     <form class="form-horizontal" role="form" action=""  method="post"> 

                                            <div class="form-group">

                                                <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Old Password</label>

                                                <div class="col-lg-8">

                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Old Password" name="opass" />

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">New Password</label>

                                                <div class="col-lg-8">

                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="New Password" name="npass" />

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="inputPassword1" class="col-lg-4 col-sm-4 control-label">Conform Password</label>

                                                <div class="col-lg-8">

                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Conform Password" name="cpass" />

                                                </div>

                                            </div>

                                           

                                            <div class="form-group">

                                                <div class="col-lg-offset-2 col-lg-10">

                                                    <button type="submit" class="btn btn-default" name="upd_pass">SAVE</button>

                                                </div>

                                            </div>

                                        </form>



                                    </div>



                                </div>

                            </div>

                        </div>

                        <!---------------------end pop ----------->