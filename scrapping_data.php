<?php 

session_start();

ob_start();

include ("header.php");  

include ("sidebar.php");

include "db.php";
if(isset($_REQUEST['submit']))
{
    
 header("location:results.php?review=".$_REQUEST['reviews']."&category=".$_REQUEST['url']."&subcategory=".$_REQUEST['subcategory']."&minprice=".$_REQUEST['minprice']."&maxprice=".$_REQUEST['maxprice']);
}

 ?>
 <section id="main-content" class="">

        <section class="wrapper">

        <!-- page start-->

        <!-- page start-->

        <div class="row">

            <div class="col-lg-12">

                    <section class="panel"> 

                        <header class="panel-heading">

                            Scrapping Data

                        </header>

                        <div class="panel-body">

                            <div class="">

                                <form role="form" name="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">

                                    <label for="exampleInputEmail1" class="col-sm-3 col-md-3 col-xs-12">Amazon Category</label>
                                        <div class="col-sm-9 col-md-9 col-xs-12">
                                    <select class="nav-search-dropdown searchSelect form-control" data-nav-digest="nNneGCbvN9H9+U8w++7Pf+QYjbw" data-nav-selected="2" id="searchDropdownBox" name="url" tabindex="18" title="Search in" style="top: 0px;">
<option  selected="selected" value="search-alias=aps">All Departments</option>
<option value="search-alias=alexa-skills">Alexa Skills</option>
<option value="search-alias=instant-video">Amazon Video</option>
<option value="search-alias=warehouse-deals">Amazon Warehouse Deals</option>
<option  value="search-alias=appliances">Appliances</option>
<option value="search-alias=mobile-apps">Apps &amp; Games</option>
<option value="search-alias=arts-crafts">Arts, Crafts &amp; Sewing</option>
<option value="search-alias=automotive">Automotive Parts &amp; Accessories</option>
<option value="search-alias=baby-products">Baby</option> 
<option value="search-alias=beauty">Beauty &amp; Personal Care</option>
<option value="search-alias=stripbooks">Books</option>
<option value="search-alias=popular">CDs &amp; Vinyl</option>
<option value="search-alias=mobile">Cell Phones &amp; Accessories</option>
<option value="search-alias=fashion">Clothing, Shoes &amp; Jewelry</option>
<option value="search-alias=fashion-womens">&nbsp;&nbsp;&nbsp;Women</option>
<option value="search-alias=fashion-mens">&nbsp;&nbsp;&nbsp;Men</option>
<option value="search-alias=fashion-girls">&nbsp;&nbsp;&nbsp;Girls</option>
<option value="search-alias=fashion-boys">&nbsp;&nbsp;&nbsp;Boys</option>
<option value="search-alias=fashion-baby">&nbsp;&nbsp;&nbsp;Baby</option>
<option value="search-alias=collectibles">Collectibles &amp; Fine Art</option>
<option value="search-alias=computers">Computers</option>
<option value="search-alias=courses">Courses</option>
<option value="search-alias=financial">Credit and Payment Cards</option>
<option value="search-alias=digital-music">Digital Music</option>
<option value="search-alias=electronics">Electronics</option>
<option value="search-alias=gift-cards">Gift Cards</option>
<option value="search-alias=grocery">Grocery &amp; Gourmet Food</option>
<option value="search-alias=handmade">Handmade</option>
<option value="search-alias=hpc">Health, Household &amp; Baby Care</option>
<option value="search-alias=local-services">Home &amp; Business Services</option>
<option value="search-alias=garden">Home &amp; Kitchen</option>
<option value="search-alias=industrial">Industrial &amp; Scientific</option>
<option value="search-alias=digital-text">Kindle Store</option>
<option value="search-alias=fashion-luggage">Luggage &amp; Travel Gear</option>
<option value="search-alias=luxury-beauty">Luxury Beauty</option>
<option value="search-alias=magazines">Magazine Subscriptions</option>
<option value="search-alias=movies-tv">Movies &amp; TV</option>
<option value="search-alias=mi">Musical Instruments</option>
<option value="search-alias=office-products">Office Products</option>
<option value="search-alias=lawngarden">Patio, Lawn &amp; Garden</option>
<option value="search-alias=pets">Pet Supplies</option>
<option value="search-alias=pantry">Prime Pantry</option>
<option value="search-alias=software">Software</option>
<option value="search-alias=sporting">Sports &amp; Outdoors</option>
<option value="search-alias=tools">Tools &amp; Home Improvement</option>
<option value="search-alias=toys-and-games">Toys &amp; Games</option>
<option value="search-alias=vehicles">Vehicles</option>
<option value="search-alias=videogames">Video Games</option>
<option value="search-alias=wine">Wine</option>
</select>
</div>
                                </div>

                                <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">Amazon Sub Category</label>
                                    <div class="col-sm-9 col-md-9 col-xs-12">
                                    <input type="text" class="form-control" name="subcategory" id="subcategory" placeholder="Amazon Sub Category"/>
                                        </div>
                                </div>

                                <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">Number of Reviews</label>
                                        <div class="col-sm-9 col-md-9 col-xs-12">
                                    <input type="text" class="form-control" name="reviews" id="reviews" placeholder="Number of Reviews"/>
                                        </div>
                                </div>

                                 <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">Average Review Rating</label>
                                 <div class="col-sm-9 col-md-9 col-xs-12">
                                    <input type="text" class="form-control" name="average_review" id="average_review" placeholder="Average review rating"/>
                                 </div>
                                </div>

                                  <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">Reviews in Last</label>
                                <div class="col-sm-9 col-md-9 col-xs-12">
                                    <input type="text" class="form-control" name="last_review" id="last_review" placeholder="Reviews in last"/>
                                </div>
                                </div>

                                <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">BSR Range in %</label>
                                     <div class="col-sm-9 col-md-9 col-xs-12">
                                    <input type="text" id="bsr_range" class="form-control" name="bsr_range" placeholder="BSR Range in %" />
                                 </div>
                                </div> 
                                
                                <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">Total FBA Sellers</label>
                                 <div class="col-sm-9 col-md-9 col-xs-12">
                                    <input type="text" id="fba_seller" class="form-control" name="fba_seller" placeholder="Total FBA Sellers" />
                                    </div>
                                </div> 
                                
                                <div class="form-group">

                                    <label for="name" class="col-sm-3 col-md-3 col-xs-12">Price Range</label>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <input type="text" id="price_range" class="form-control" name="minprice" placeholder="Price Range" />
                                  </div>
                                  <label for="name" class="col-sm-1 col-md-1 col-xs-12" style="margin-top: 10px;">To</label>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <input type="text" id="price_range" class="form-control" name="maxprice" placeholder="Price Range" style="margin-left: -36px;"/>
                                  </div>

                                </div> 
  
                               
                                <div class="form-group" style="text-align: center;">
                                <input type="submit" name="submit" class="btn btn-info" value="Export CSV"/>
</div>
                            </form>

                            </div>

                            

                         

                                

                        </div>

                    </section>



            </div>

            </div>

            </section>

            </section>
    

                        <?php include ('footer.php');?>