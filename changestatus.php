<?php
include("connection.php");
session_start();
extract($_REQUEST);
if(isset($updstatus))
{
	if(!empty($_SESSION['id']))
{
	  if(mysqli_query($con,"update tblorder set fldstatus='$status' where fld_order_id='$order_id'"))
	  {
		  header("location:food.php");
	  }
}
else
{
	header("location:vendor_login.php?msg=You Must Login First");
}
}

?>
<html>
<head>
<title>change order Status</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <!--bootstrap files-->
	  <style>
	  ul li{}
		ul li a {color:black;}
		ul li a:hover {color:black; font-weight:bold;}
		ul li {list-style:none;}
		img{
			border-radius: 10%;
		}
		.container1 {
  position: center;
  width: 1250px;
  height: 450px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  margin-left:50px;
}
		.inputs {
  text-align: left;
  margin-top: 30px;
}

.label, input, button {
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
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

bttn {
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

button:hover {
  box-shadow: none;
}
		</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:rgba(0, 0, 0, 0.7";>
  
    <a class="navbar-brand" href="index.php"><img src="img/logo0.png" alt="logo" style="width:120px;height:60px;"></span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:white; text-decoratio:none;"><i class="far fa-user"><?php echo $cresult['fld_name']; ?></i></a>
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
          <a class="nav-link" href="index.php" style="color: yellow;">Home
                
              </a>
        </li>

        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="services.php" style="color: yellow;">Services</a>
        </li>
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="contact.php" style="color: yellow;">Complain</a>
        </li>
		<li class="nav-item mb-auto mt-auto">
		  <form class="mb-auto mt-auto" method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			
			
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

<br><br><br><br><br><br>
   <div class="container1">
    <form method="post">
      <div class="input row">
	 
	  <div class="col-sm-4"><h3>Update Order Status</h3></div>
	  <div class="col-sm-4">Delivered<input type="radio"  name="status" value="Delivered">&nbsp;&nbsp;&nbsp;Out Of Stock<input type="radio"  name="status" value="Out Of Stock"><br>
	  <br>
	  
	  <button type="submit" class="bttn btn btn-outline-success" name="updstatus" style="background-color:yellow;border:yellow;color:black;">Update Status</button>
	  </div>
	  <div class="col-sm-4"></div>
	  
	  </div>
	  </form>
   </div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <?php
   include("footer.php");
   ?>
</body>
</html>
