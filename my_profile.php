<?php 

session_start();

ob_start();

include ("header.php");  

include ("sidebar.php");

 ?>





<?php

 include "db.php";

 

// echo "<script>alert('$session')</script>";
 
if(isset($_REQUEST['admin_update']))

{ 

    

   $email_admin=$_REQUEST['a_email'];

     $name=$_REQUEST['a_name'];

   $phone=$_REQUEST['a_phone'];

   $address=$_REQUEST['a_address'];

   //$login_time=$_REQUEST['a_logintime'];

   $dob=$_REQUEST['a_dob'];

   $pin=$_REQUEST['a_pin'];

   date_default_timezone_set("Asia/Kolkata");

   $date=date('d/m/Y h:i:s');

   

  echo $qrty = "update admin set name='$name',phone='$phone',username='$email_admin',address='$address',DOB='$dob',pin_code='$pin' where id='$session'";

   

   mysql_query($qrty); 

   

     $path=$_FILES['admin_image']['name'];    

     $txt = pathinfo($path,PATHINFO_EXTENSION);

    if($txt!=null)

    {

    move_uploaded_file($_FILES["admin_image"]["tmp_name"], "img/admin_pic/$email_admin.$txt") ;

    mysql_query("update admin set pic='$email_admin.$txt' where id='$session'"); 

    }  

    echo '<script>alert("Profile Detail Update Successfully")</script>';

    echo '<script>window.location.href="my_profile.php";</script>';

    

    }

 ?>





<?php



$query=mysql_query(" select * from admin where id = '".$session."' ");

$qry=mysql_fetch_assoc($query);

{



?>







 

                

   <section id="main-content" class="">

        <section class="wrapper">

        <!-- page start-->

        <!-- page start-->

        <div class="row">

            <div class="col-lg-12">

                    <section class="panel"> 

                        <header class="panel-heading">

                            My Profile

                        </header>

                        <div class="panel-body">

                            <div class="position-center">

                                <form role="form" name="form" action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Name</label>

                                    <input type="name" class="form-control" name="a_name" id="exampleInputEmail1" placeholder="Name" value="<?php echo $qry['name']; ?>" />

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Email</label>

                                    <input type="email" class="form-control" name="a_email" id="exampleInputPassword1" placeholder="Email" value="<?php echo $qry['username']; ?>"/>

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Date of Birth&nbsp;MM/DD/YYY</label>

                                    <input type="date" class="form-control" name="a_dob" id="exampleInputPassword1" placeholder="Date of Birth" value="<?php echo $qry['DOB']; ?>" />

                                </div>

                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Phone</label>

                                    <input type="phone" class="form-control" name="a_phone" id="exampleInputPassword1" placeholder="Phone" value="<?php echo $qry['phone']; ?>" />

                                </div>

                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Address</label>

                                    <input type="text" class="form-control" name="a_address" id="exampleInputPassword1" placeholder="Address" value="<?php echo $qry['address']; ?>" />

                                </div>

                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Pin Code</label>

                                    <input type="pincode" class="form-control" name="a_pin" id="exampleInputPassword1" placeholder="Pin Code" value="<?php echo $qry['pin_code']; ?>" />

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputFile">Update Image</label>

                                    <input type="file" id="exampleInputFile" name="admin_image"  />

                                </div> 

                               

                                <input type="submit" name="admin_update" class="btn btn-info" value="Update"/>

                            </form>

                            </div>

                            

                          <?php } ?>

                                

                        </div>

                    </section>



            </div>

            </div>

            </section>

            </section>

           

                        <?php include ('footer.php');?>