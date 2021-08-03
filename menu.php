<?php
session_start();


include("connection.php");
extract($_REQUEST);
$arr=array();
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $cresult=mysqli_fetch_array($cquery);
}
else
{
	$cust_id="";
}
 

if(Isset($vendor_id))
{
$vid= $vendor_id;
}




$query=mysqli_query($con,"select  tblvendor.fld_name,tblvendor.fldvendor_id,tblvendor.fld_email,
tblvendor.fld_mob,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
tbfood.cuisines,tbfood.paymentmode 
from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id;");
while($row=mysqli_fetch_array($query))
{
	$arr[]=$row['food_id'];
	shuffle($arr);
}

//print_r($arr);

 if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
 }
 
 if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:index.php");
 }
 $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
if(isset($message))
 {
	 
	 if(mysqli_query($con,"insert into tblmessage(fld_name,fld_email,fld_phone,fld_msg) values ('$nm','$em','$ph','$txt')"))
     {
		 echo "<script> alert('We will be Connecting You shortly')</script>";
	 }
	 else
	 {
		 echo "failed";
	 }
 }

?>
<html>
  <head>
     <title>Home</title>
	 <!--bootstrap files-->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <!--bootstrap files-->
	 
	 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
     
	 
	 
	 
	 <script>
	 //search product function
            $(document).ready(function(){
	
	             $("#search_text").keypress(function()
	                      {
	                       load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch2.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#result').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_text').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         $('#result').html(data);			
		                              }
	                                });
	                              });
	                            });
								
								//hotel search
								$(document).ready(function(){
	
	                            $("#search_hotel").keypress(function()
	                         {
	                         load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#resulthotel').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_hotel').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         load_data();			
		                              }
	                                });
	                              });
	                            });
</script>
<style>
//body{
     background-image:url("img/main_spice2.jpg");
	 background-repeat: no-repeat;
	 background-attachment: fixed;
	  background-position: center;
}
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}

.container1 {
  position: center;
  width: 150px;
  height: 550px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}
.image {
  height: 150px;
  width: 230px;
  background-image: url("EatMubarakLogo.png");
  margin: auto;
  border-radius: 10%;
  /* box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white; */
  display: block;
  margin-left: auto;
  margin-right: auto;

}

</style>
  </head>
  
    
	<body>
	




	<div id="result" style="position:fixed;top:300; right:500;z-index: 3000;width:350px;background:transparent;"></div>
<div id="resulthotel" style=" margin:0px auto; position:fixed; top:150px;right:750px; background:transparent;  z-index: 3000;"></div>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:rgba(0, 0, 0, 0.7";>
  
    <a class="navbar-brand" href="index.php"><img src="img/logo0.png" alt="logo" style="width:120px;height:60px;"></span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:yellow; text-decoratio:none;"><i class="far fa-user">&nbsp <?php echo $cresult['fld_name']; ?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto mb-auto mt-auto">
        
		<li class="nav-item mb-auto mt-auto"><!--hotel search-->
		     <a href="#" class="nav-link"><form class="mb-auto mt-auto" method="post"><input type="text" name="search_hotel" id="search_hotel" placeholder="Search Restaurant" class="form-control " /></form></a>
		  </li>
          <li class="nav-item mb-auto mt-auto">
		     <a href="#" class="nav-link"><form  class="mb-auto mt-auto" method="post"><input type="text" name="search_text" id="search_text" placeholder="Search by Food Name " class="form-control " /></form></a>
		  </li>
		  <li class="nav-item mb-auto mt-auto active ">
          <a class="nav-link" href="index.php" style="color:yellow;">Home
                
              </a>
        </li>

       <!-- <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="services.php">Services</a>
        </li> -->
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="contact.php" style="color:yellow;">Complain</a>
        </li>
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="comparing_restaurant.php" style="color:yellow;">Compare price</a>
        </li>
		<li class="nav-item mb-auto mt-auto">
		  <form class="mb-auto mt-auto" method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<a href="form/index.php?msg=you must be login first"><span style="color:red;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:white;" id="cart"  class="badge ">0</span></i></span></a>
			
			
			<button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button>
            <?php
			}
			else
			{
			?>
			<a href="form/cart.php"><span style=" color:green; "><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge "><?php if(isset($re)) { echo $re; }?></span></i></span></a>
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>
			<?php
			}
			?>
			</form>
        </li>
		
      </ul>
	  
    </div>
	
</nav>
<!--menu ends-->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/coffee_foam_beverage_cup_saucer_creative_continents_84944_1920x1080 (1).jpg" alt="karachi" class="d-block w-100" style="border-radius: 0%; height:800px;">
      <div class="carousel-caption">
        <h3>Coffee Planet</h3>
        <p>We had such a great time in Coffee Planet!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/bg9.jpg" alt="Chinatown" class="d-block w-100" style="border-radius: 0%;height:800px;">
      <div class="carousel-caption">
        <h3>Burger House</h3>
        <p>Thank you, BH!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/bgg.jpg" alt="New Yorker" class="d-block w-100" style="border-radius: 0%;height:800px;">
      <div class="carousel-caption">
        <h3>Prefer Fries Over Lies</h3>
        <p>Beyond Delicious!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!--slider ends-->

<!--container 1 starts-->

<br><br>
<div class="container-fluid">
  <div class="row">
	<?php
	   $food_id=$arr[0];
	  $query=mysqli_query($con,"select tblvendor.fld_email,tbfood.food_id,tbfood.foodname,tbfood.cost, tbfood.cuisines,tbfood.paymentmode, tbfood.fldimage from tbfood INNER JOIN tblvendor ON tbfood.fldvendor_id =tblvendor.fldvendor_id where tbfood.fldvendor_id = '$vid' ");
	  while($res=mysqli_fetch_assoc($query))
	  {
		   $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  ?>
    <div class="col-md-4">
	<br><br>
	<div class="container1 container-fluid rounded" >
	
	  <div class="container-fluid">
	  <div class="container-fluid">
	    <div class="row" style="padding:10px; ">

		<div class="col-sm-6">
		 	<h3><?php echo"(" .$res['foodname'].")"?></h3>
		 </div>

		 	<div class="col-sm-4">
		 		<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span>&nbsp;<i  style="font-size:20px;font-weight: bold;" >Rs.</i>
		 	</div>

		 	<div class="col-sm-2">
				<form method="post">
					<div class="col-sm-2" style="text-align:left;padding:10px; font-size:20px;">
						<button type="submit" name="addtocart" value="<?php echo $res['food_id'];?>" ><span style="color:green;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button>
					</div>
				</form>
			</div>
		</div>
		 
	  </div>
	  <div class="container-fluid">
	  <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		 <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Food Image"></div>
		 
		 </div>
	  </div>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		 <div class="col-sm-12">
			 <span><li><?php echo $res['cuisines']; ?></li></span>
			 <span><li><?php echo $res['cost']." Rs."; ?>&nbsp;for 1</li></span>
			 <span><li>Up To 60 Minutes</li></span>
		 </div>

		 </div>
		 
	  </div>
	
	
	
	</div>
	
	</div>
	
	</div>
    <?php
	  }
	?>
  </div>
</div>
<br><br>

<!--footer primary-->
	     
		    <?php
			include("footer.php");
			?>
			 			 
		  
          

	</body>
</html>
