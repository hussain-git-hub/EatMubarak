<?php
session_start();

extract($_REQUEST);
include("../connection.php");
$gtotal=array();
$ar=array();
$total=0;
if(isset($_GET['product']))//product id
{
	$product_id=$_GET['product'];
}
else
{
	$product_id="";
}
 if(isset($_SESSION['cust_id']))
 {
 $cust_id=$_SESSION['cust_id'];
 $qq=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $qqr= mysqli_fetch_array($qq);
 }
if(empty($cust_id))
{
	header("location:index.php?msg=you must login first");
}
if(!empty($product_id && $cust_id ))
{
if(mysqli_query($con,"insert into tblcart (fld_product_id,fld_customer_id) values ('$product_id','$cust_id') "))
{
	echo "success";
	$product_id="";
	header("location:cart.php");
}
else
{
	echo "failed";
}
}
if(isset($del))
{
	
	//echo $del;
	if(mysqli_query($con,"delete from tblcart where fld_cart_id='$del' && fld_customer_id='$cust_id'"))
	{
		header("location:deletecart.php");
	}
	
}
 
 
 if(isset($logout))
 {
	 session_destroy();
	 
	 header("location:../index.php");
 }
 if(isset($login))
 {
	 session_destroy();
	 
	 header("location:index.php");
 }
 
 //update section
  $cust_details=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
  $det_res=mysqli_fetch_array($cust_details);
  $fld_name=$det_res['fld_name'];
  $fld_email=$det_res['fld_email'];
  $fld_mobile=$det_res['fld_mobile'];
  $fld_password=$det_res['password'];
  if(isset($update))
  {
	   
	 if(mysqli_query($con,"update tblcustomer set fld_name='$name',fld_mobile='$mobile',password='$pswd' where fld_email='$fld_email'"))
      {
	   header("location:customerupdate.php");
	  }
  }
  
  $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <style>
		ul li{list-style:none;}
		ul li a {color:black;text-decoration:none; }
		ul li a:hover {color:black;text-decoration:none; }

		.container1 {
  position: center;
  width: 1205px;
  height: 400px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  /* box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white; */
  margin-left:10px;
}
.container2 {
  position: center;
  width: 1205px;
  height: 500px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  /* box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white; */
  margin-left:10px;
}
.container3 {
  position: center;
  width: 1205px;
  height: 400px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  /* box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white; */
  margin-left:10px;
}
.inputs {
  text-align: left;
  margin-top: 30px;
}
img{
	border-radius: 10%;
}
.label2, input, {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}
.button2 {
  display: block;
  width:250px;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

.label2 {
  margin-bottom: 4px;
}

.label2:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

input {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

.button2 {
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

.button2:hover {
  box-shadow: none;
}
	 </style>
	 <script>
		  function del(id)
		  {
			  if(confirm('are you sure you want to cancel order')== true)
			  {
				  window.location.href='cancelorder.php?id=' +id;
			  }
		  }
		</script>

</head>
<body style="background-image: url('../img/bg2.jpg'); background-repeat: no-repeat;  background-size:cover;">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:rgba(0, 0, 0, 0.7";>
  
    <a class="navbar-brand" href="../index.php"><img src="../img/logo1.png" alt="logo" style="width:120px;height:60px;"></span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:white; text-decoratio:none;"><i class="far fa-user" >&nbsp <?php echo $qqr['fld_name']; ?></i></a>
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
          <a class="nav-link" href="../index.php">Home
                
              </a>
        </li>

        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="../services.php">Services</a>
        </li>
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="../contact.php">Complain</a>
        </li>
		<li class="nav-item mb-auto mt-auto">
		  <form class="mb-auto mt-auto" method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<a href="index.php?msg=you must be login first"><span style="color:red;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:white;" id="cart"  class="badge ">0</span></i></span></a>
			
			
			<button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button>
            <?php
			}
			else
			{
			?>
			<a href="cart.php"><span style=" color:green; "><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge "><?php if(isset($re)) { echo $re; }?></span></i></span></a>
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>
			<?php
			}
			?>
			</form>
        </li>
		
      </ul>
	  
    </div>
	
</nav>

<!--navbar ends-->


<br><br><br><br>
<div class="middle" style="  padding:60px; border:1px solid #ED2553;  width:100%;">
       <!--tab heading-->
	   <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#ED2553;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" style="color:#BDDEFD;" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="true">View Cart</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#BDDEFD;" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
          </li>
		  
       </ul>
	   <br><br>
	<!--tab 1 starts-->   
	   <div class="tab-content" id="myTabContent">
	   
            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
				<div class="container1">
                 <table class="table">
                  <tbody>
	               <?php
	                  $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
	                  $re=mysqli_num_rows($query);
	                   if($re)
	                    {
		                 while($res=mysqli_fetch_array($query))
		                  {
			                $vendor_id=$res['fldvendor_id'];
			               $v_query=mysqli_query($con,"select * from tblvendor where fldvendor_id='$vendor_id'");
			               $v_row=mysqli_fetch_array($v_query);
			               $em=$v_row['fld_email'];
			               $nm=$v_row['fld_name'];
	                ?>
                      <tr>
                         <td><image src="../image/restaurant/<?php echo $em."/foodimages/".$res['fldimage'];?>" height="80px" width="100px"></td>
                         <td><?php echo $res['foodname'];?></td>
                         <td><?php echo $res['cost']." Rs.";?></td>
                         <td><?php echo $res['cuisines'];?></td>
                         <td><?php echo $nm; ?></td>
		                <form method="post" enctype="multipart/form-data">
                           <td><button type="submit" name="del"  value="<?php echo $res['fld_cart_id']?>" class="btn btn-danger">Delete</button></td>
                        </form>
                        <td><?php $total=$total+$res['cost']; $gtotal[]=$total;  ?></td>
                      </tr>
					  
					  
                   <?php
	                    }
						?>
						<tr>
					  <td>
					  <h5 style="color:red;">Grand total</h5>
					  </td>
					  <td>
					  <h5><?php echo end($gtotal); ?>&nbsp;<i style="font-weight: bold;">Rs.</i></h5>
					  </td>
					  <td>
					  
					  </td>
					  <td></td>
					  
					  <td style="padding:30px; text-align:center;">
					  <a href="order.php?cust_id=<?php echo $cust_id; ?>"><button type="button" style=" color:white; font-weight:bold; text-transform:uppercase;" class="btn btn-warning">Proceed to checkout</button></a>
					  </td>
					  <td></td>
					  </tr>
						
						<?php
	
	                  }
					  else
					  {
						  
	
	                 ?>
					 <tr><button type="button" class="btn btn-outline-success"><a href="../index.php" style="color:green; text-decoration:none;">No Items In cart Let's Shop Now</a></button></tr>
					 
					 <?php
					  }
					 ?>
                 </tbody>
	      </table>
		  </div>
		  <span style="color:green; text-align:centre;"><?php if(isset($success)) { echo $success; }?></span>
		       
			   
		 
		
         </div>	 
	  
<!--tab 1 ends-->	   
			
			
			<!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
				<div class="container2">
			    <form method="post" enctype="multipart/form-data">
				<div class=input>
                    <div class="form-group">
                      <label for="name" class="label2">Name</label>
                      <input type="text" id="name" value="<?php if(isset($fld_name)){ echo $fld_name;}?>" class="form-control" name="name" required="required"/>
                    </div>
					
					<div class="form-group">
                      <label for="email" class="label2">Email</label>
                      <input type="email" id="email" name="email" value="<?php if(isset($fld_email)){ echo $fld_email;}?>" class="form-control"  readonly/>
                    </div>
					<div class="form-group">
                      <label for="mobile" class="label2">Mobile</label>
                      <input type="tel" id="mobile" class="form-control" name="mobile" pattern="0[65]{1}[0-9]{8}" value="<?php if(isset($fld_mobile)){ echo $fld_mobile;}?>" placeholder="" required>
                    </div>
					
                   <div class="form-group">
                      <label for="pwd" class="label2">Password:</label>
                     <input type="password" name="pswd" value="<?php if(isset($fld_password)) { echo $fld_password; }?>"class="form-control"  id="pwd" required/>
                   </div>
				   
				   
 
                  <button type="submit" name="update" style="background:#ED2553; border:1px solid #ED2553;" class="button2 btn btn-primary">Update</button>
                  <div class="footer" style="color:red;"><?php if(isset($ermsg)) { echo $ermsg; }?><?php if(isset($ermsg2)) { echo $ermsg2; }?></div>
				  </div>
				</form>
			 </div>
			</div>
			<!--tab 2 ends-->
			 <!--tab 3 starts-->
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
				<div class="container3">
			    <table class="table">
				<th>Order Number</th>
				<th>Item Name</th>
				<th>Price</th>
				<th>Cancel order</th>
				    <tbody>
					<?php
					$quer_res=mysqli_query($con,"select * from tblorder where fld_email_id='$cust_id' && fldstatus='In Process'");
					while($roww=mysqli_fetch_array($quer_res))
					{   
				         $fid=$roww['fld_food_id'];
				         $qr=mysqli_query($con,"select * from tbfood where food_id='$fid'");
						 $qrr=mysqli_fetch_array($qr);
						
					  
					?>
					   <tr>
					   <td><?php echo $roww['fld_order_id']; ?></td>
					   <?php
					   if(empty($qrr['foodname']))
					   {
					   ?>
					   <td><span style="color:red;">Product Not Available Now</span></td>
					   <?php
					   }
					   else
					   {
						   ?>
						    <td><?php echo $qrr['foodname']; ?></td>
						   <?php
					   }
					   ?>
					  
					   <td><?php echo $qrr['cost']; ?></td>
					   <td><a href="#" onclick="del(<?php echo $roww['fld_order_id'];?>);"><button type="button" class="btn btn-danger">Cancel Order</button></a></td>
					   </tr>
					 <?php
					}
					 ?>  
					</tbody>
				</table>
				</div>
			</div>
			<!--tab 3 ends-->
	  </div>
	</div>  
	  
<?php
include("footer.php");
?>


   
</body>
</html>
