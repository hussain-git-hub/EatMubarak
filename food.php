<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
 $id=$_SESSION['id'];
 $vq=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
 $vr=mysqli_fetch_array($vq);
 $vrid=$vr['fldvendor_id'];
}

if(!isset($_SESSION['id']))
{
	header("location:vendor_login.php?msg=Please Login To continue");
}
else
{
$query=mysqli_query($con,"select * from tblvendor   where fld_email='$id'");
if(mysqli_num_rows($query))
{   if(!file_exists("image/restaurant/".$id."/foodimages"))
	{
		$dir=mkdir("image/restaurant/".$id."/foodimages");
	}
	$row=mysqli_fetch_array($query);
    $v_id=$row['fldvendor_id'];
}
else
{
	
	header("location:index.php");
	
	
}
}


if(isset($add))
{   if(isset($_SESSION['id']))
	{
    $img_name=$_FILES['food_pic']['name'];
    if(!empty($chk)) 
	{
	$paymentmode=implode(",",$chk);
	if(mysqli_query($con,"insert into tbfood(fldvendor_id,foodname,cost,cuisines,paymentmode,fldimage) values
	
	('$v_id','$food_name','$cost','$cuisines','$paymentmode','$img_name')"))
	{
		move_uploaded_file($_FILES['food_pic']['tmp_name'],"image/restaurant/$id/foodimages/".$_FILES['food_pic']['name']);
	}
	else{
		echo "failed";
	}
  }
  else 
  {
	  $paymessage="please select a payment mode";
  }
	}
	else
	{
		header("location:vendor_login.php");
	}
}

if(isset($logout))
{
	session_destroy();
	header("location:index.php");
}
if(isset($upd_account))
				{
					
					//echo $fn;
					//echo $emm;
					//echo $add;
					if(mysqlI_query($con,"update tblvendor set fld_name='$fn',fld_email='$emm',fld_address='$add',fld_mob='$mob',fld_password='$pwsd' where fld_email='$id'"))
				   {
						 header("location:infoUpdate.php");
					}
			  }
			  if(isset($upd_logo))
			  {
				  if(isset($_SESSION['id']))
				  {
				  $log_img=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
                  $log_img_row=mysqli_fetch_array($log_img);
				  $old_logo=$log_img_row['fld_logo'];
				  $new_img_name=$_FILES['logo_pic']['name'];
				  
				  if(mysqli_query($con,"update tblvendor set fld_logo='$new_img_name' where fld_email='$id'"))
				  {
					  unlink("image/restaurant/$id/$old_logo");
					  move_uploaded_file($_FILES['logo_pic']['tmp_name'],"image/restaurant/$id/".$_FILES['logo_pic']['name']);
				      
					  header("location:update_food.php");
					  
				  }
			  }
			  else
			  {
				  header("location:vendor_login.php?msg=Please Login To continue");
			  }
			  }
			  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>EAT Mubarak</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/font.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	 <style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}

.container1 {
  position: center;
  width: 100%;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  /* box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white; */

}
.container2 {
  position: center;
  width: 100%;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  /* box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white; */
}
.inputs {
  text-align: left;
  margin-top: 30px;
}

.label, input {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

.label {
  margin-bottom: 4px;
}

.label:nth-of-type(2) {
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
  border-radius: 10px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

button {

}
.chack{
	width: 4%;
}
.bttn{
	width:180px;
	background-color: yellow;
	color:black;
	border:yellow;
}
button:hover {
  box-shadow: none;
}
button{
	background-color: yellow;
	color:black;
}
img{
	border-radius: 10%;
}
	 </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:rgba(0, 0, 0, 0.7";>

<a class="navbar-brand" href="index.php"><img src="img/logo0.png" alt="logo" style="width:120px;height:60px;" id="image"></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php" style="color:yellow;">Home

              </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="services.php" style="color:yellow;">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" style="color:yellow;">Complain</a>
        </li>

		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($_SESSION['id']))
			{
			?>
		   <button class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>

      </ul>
	  
    </div>
	
</nav> 







<!--navbar ends-->


<br><br>
<div class="middle" style=" padding:40px;   width:100%;">
       <!--tab heading-->
	   <ul class="nav nav-tabs nabbar_inverse rounded" id="myTab" style="background:yellow;color:black;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="home" aria-selected="true" style="color:black;">Manage Products</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="profile" aria-selected="false" style="color:black;">Add Products</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" id="accountsettings-tab" data-toggle="tab" href="#accountsettings" role="tab" aria-controls="accountsettings" aria-selected="false" style="color:black;">Account Settings</a>
          </li>
		  
		  <li class="nav-item">
              <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false" style="color:black;">Update Logo</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false" style="color:black;">Order Status</a>
          </li>
		  
       </ul>
	   <span style="color:green;"><?php if(isset($msgs)) { echo $msgs; }?></span>
	<!--tab 1 starts-->   
	   <div class="tab-content" id="myTabContent">
	   
            <div class="tab-pane fade show active rounded" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
                 <div class="container1"> 
					 <div class="input">
			 <table width="100%" border="1" bordercolor="black" cellpadding="5px">
			 <th>food Image</th>
			 <th>food name</th>
			 <th>food Price</th>
			 <th>food cuisines </th>
			 <th>Payment Mode  </th>
			 <th>Delete Item   </th>
			 <th>Update item Details </th>
			   <?php
					  if($query=mysqli_query($con,"select tblvendor.fldvendor_id,tblvendor.fld_email,tbfood.food_id,tbfood.foodname,tbfood.cost,tbfood.paymentmode,tbfood.cuisines,tbfood.fldimage,tblvendor.fld_name from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tblvendor.fld_email='$id'"))
					  {
						  if(mysqli_num_rows($query))
						  {
						 while($row=mysqli_fetch_array($query))
						 {
							 
							 ?>
			     <tr>
				 				 
				<td><img src="<?php echo 'image/restaurant/'.$id.'/foodimages/'.$row['fldimage'];?>" height="100px" width="150px"></td>
				<td style="width:150px;"><?php  echo $row['foodname']."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row['cost']."<br>";?></td>
				<td  align="center" style="width:150px;"><?php  echo $row['cuisines']."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row['paymentmode']."<br>";?></td>
				
				<td align="center" style="width:150px;">
				
				<a href="vendor_delete_food.php?food_id=<?php echo $row['food_id'];?>"><button type="button" class="btn btn-warning" style="background-color: yellow;border:black;">Delete </button></a>
				
				</td>
				<td align="center" style="width:150px;">
				
				<a href="update.php?food_id=<?php echo $row['food_id'];?>"><button type="button" class="btn btn-danger" style="background-color: yellow;color:black;border:black;">Update </button></a>
				
				</td>
				</tr>
				
				<?php 
					
                    $foodname="";
                    $cuisines="";
                    $cost="";					
						 }
					  }
					  else 
						  
						  {
							   $msg="please add some Items";
						  }
					  }
					  else 
					  {
						  echo "failed";
					  }
					  
					  ?>
			 </table>
			 </div>
			 </div>    	 
	        </div>
<!--tab 1 ends-->	   
			
			
			<!--tab 2 starts-->
            <div class="tab-pane fade rounded" id="manageaccount" role="tabpanel" aria-labelledby="profile-tab">
			         <!--add Product-->
					 <div class="container2">
                        <form action="" method="post" enctype="multipart/form-data">
						<div class="input">
                                     <div class="form-group"><!--food_name-->
                                     <label for="food_name" class="label">Food Name:</label>
                                            <input type="text" class="form-control" id="food_name" value="<?php if(isset($food_name)) { echo $food_name;}?>" placeholder="Enter Food Name" name="food_name" required>
                                     </div>
									 
									 
                                     <div class="form-group"><!--cost-->
                                            <label for="cost" class="label">Cost :</label>
                                            <input type="number" class="form-control" id="cost"  value="<?php if(isset($cost)) { echo $cost;}?>" placeholder="10000" name="cost" required>
                                     </div>
									 
									 
	                                 <div class="form-group"><!--cuisines-->
                                            <label for="cuisines" class="label">Cuisines :</label>
                                            <input type="text" class="form-control" id="cuisines" value="<?php if(isset($cuisines)) { echo $cuisines;}?>" placeholder="Enter Cuisines" name="cuisines" required>
                                    </div>
							        
							        <div class="form-group"><!--payment_mode-->
                                         <input type="checkbox" name="chk[]" value="COD" class="chack"/>Cash On Delivery
			                             <input type="checkbox" name="chk[]" value="Online Payment" class="chack"/>Online Payment
								         <br>
								        <span style="color:red;"><?php if(isset($paymessage)){ echo $paymessage;}?></span>
			      			        </div>
							   
	                                <div class="form-group">
                                         <input type="file" accept="image/*" name="food_pic" required/>Food Snaps 
                                    </div>
   
                                    <button type="submit" name="add" class="bttn btn btn-primary">ADD Item</button>
									<br>
									<span style="color:red;"><?php if (isset($msg)){ echo $msg;}?></span>
									</div>
                               </form>
							   </div>
			</div>
			<!--tab 2 ends-->
			
			
			 <!--tab 3-- starts-->
			 <div class="tab-pane fade" id="accountsettings" role="tabpanel" aria-labelledby="accountsettings-tab">
				 <div class="container2">
			    <form method="post" enctype="multipart/form-data">
				<?php
			    $upd_info=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
				$upd_info_row=mysqlI_fetch_array($upd_info);
				 $nm=$upd_info_row['fld_name'];
				 $emm=$upd_info_row['fld_email'];
				 $log=$upd_info_row['fld_logo'];
				$ad=$upd_info_row['fld_address'];
				$mb=$upd_info_row['fld_mob'];
				$psd=$upd_info_row['fld_password'];
				
				?>
				<div class="input">
                    <div class="form-group">
                      <label for="name" class="label">Name</label>
                      <input type="text" id="username" value="<?php if(isset($nm)){ echo $nm;}?>" class="form-control" name="fn" />
                    </div>
					<div class="form-group">
                      <label for="email" class="label">Email</label>
                      <input type="text" id="email" value="<?php if(isset($emm)){ echo $emm;}?>" class="form-control" name="emm" readonly="readonly"/>
                    </div>
					<div class="form-group">
                      <label for="address" class="label">Address</label>
                      <input type="text" id="address" value="<?php if(isset($ad)){ echo $ad;}?>" class="form-control" name="add" required/>
                    </div>
					<div class="form-group">
                      <label for="mobile" class="label">Contact no</label>
                      <input type="text" id="mobile" pattern="0[65]{1}[0-9]{8}" value="<?php if(isset($mb)){ echo $mb;}?>" class="form-control" name="mob" required/>
                    </div>
					
                   <div class="form-group">
                      <label for="pwd" class="label">Password:</label>
                     <input type="password" name="pwsd" class="form-control" value="<?php if(isset($psd)){ echo $psd;}?>" id="pwd" required/>
                   </div>
				   
				   
 
                  <button type="submit" name="upd_account" class="bttn btn btn-primary">Update</button>
                  </div>
			 </form>
					</div>
			</div>
			<div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                <div class="container2">
				    <form class="form" method="post" enctype="multipart/form-data">
				       <input type="file" name="logo_pic" accept="image/*" required/>
					   <button type="submit" name="upd_logo" class="bttn btn btn-outline-primary">Update Logo</button>
			        </form>
				</div>
			</div>
			 <div class="tab-pane fade " id="status" role="tabpanel" aria-labelledby="status-tab">
				 <div class="container2">
	            <table class="table">
					<div class="input">
				<tbody>
				<th>Order Id</th>
				<th>Customer Email</th>
				<th>Food Id</th>
				<th>Order Status</th>
				<th>Update Status</th>
				<?php
				$orderquery=mysqli_query($con,"select * from tblorder where fldvendor_id='$vrid'");
				if(mysqli_num_rows($orderquery))
				{
					while($orderrow=mysqli_fetch_array($orderquery))
					{
						$stat=$orderrow['fldstatus'];
						?>
						<tr>
						<td><?php echo $orderrow['fld_order_id']; ?></td>
						<td><?php echo $orderrow['fld_email_id']; ?></td>
						<td><?php echo $orderrow['fld_food_id']; ?></td>
						<?php
			   if($stat=="cancelled" || $stat=="Out Of Stock")
			   {
			   ?>
			   <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $orderrow['fldstatus']; ?></span></td>
			   <?php
			   }
			   else
				   
			   {
			   ?>
			   <td><span style="color:green;"><?php echo $orderrow['fldstatus']; ?></span></td>
			   <?php
			   }
			   ?>
						<form method="post">
						<td><a href="changestatus.php?order_id=<?php echo $orderrow['fld_order_id']; ?>"><button type="button" name="changestatus">Update Status</button></a></td>
						</form>
						<tr>
						<?php
					}
				}
				?>
				</tbody>
				</div>
				</table>
				</div>
			 </div>
	  </div>
	</div>  
	
	<?php
include("footer.php");
?>

</body>
</html>
