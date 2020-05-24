<?php
session_start();
include("includes/db.php");
if(isset($_POST['Insert']))
{
	   $name = $_POST['Eno'];
	  $pass = $_POST['Password'];
	 
	 $sql = "select * from register where Eno='$name' and Password='$pass'";
	 
	 $result = mysqli_query($con,$sql);
	 
	  $n = mysqli_num_rows($result);
	  
	  if($n>0)
	  {
	 
		   $_SESSION['Eno']=$name;
           header('Location:Edit.php');

	  }else
	  {
		    echo "<script>alert(' Invalid User Name and password')</script>";
	  }
}

?>

<html>
	<head>
		<title>Alumni Registration System</title>
		  
		<link rel = "stylesheet" href ="styles/abc.css" media = "all">
		
		<script>
		
			function validateform()
			{  
			  var no = document.myform.Eno.value; 
			   var pass = document.myform.Password.value; 
				if(no=="")
				{
					alert("Enrollment  No should not be blank");
					return false;
				}
				if(pass=="")
				{
					alert("Password should not be blank");
					return false;
				}
		   }  
		  
		</script>
	</head> 
	
<body>

	     <div class = "main_wrapper">
		 
	
		     <div class = "header_wrapper"> 
			       <img id ="logo" src ="images/abc.jpg" />
<h1 align = "center"> <br> <b> Amrutvahini College Of Engineering, Sangamner.</b> </h1>
			       
			</div>
	
		
	
		     <div class="menubar"> 
				<ul id="menu">
					<li><a href = "index.php">Home</a></li>
<li><a href = "account.php">Login</a></li>
<li><a href = "register.php">Register</a></li>
<li><a href = "admin_area/index.php">Admin Login</a></li>
<li><a href = "gallery.php">Gallery</a></li>
<li><a href = "contact.php">Contact us</a></li>
<li><a href = "about.php">About us</a></li>
			</ul>
			 
			 </div>

           <div class ="content_wrapper">
				<div id = "sidebar">
				  <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
				    <b>Latest News</b>
				</marquee>
				</div>
				
				
			       <div id = "content_area"> 
				
					<html>
<head>
<title>Student Login Form</title>

</head>
 

<form name="myform" action="account.php" method="post" onsubmit="return validateform()">
<center>
				 <br>
				 <h2>LOGIN</h2>
				 <br>
 </center>
 <center>
<table >

 <!----- Enrollment No ---------------------------------------------------------->
 <tr>
<td>ERP No</td>
<td><input type="text" name="Eno" maxlength="30" required/>

</td>
</tr>
 

<!----- Enter Password ---------------------------------------------------------->
<tr>
<td>Password</td>
<td><input type="password" name="Password" maxlength="30" required/>

</td>
</tr>

 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Login" name="Insert">
<input type="reset" value="cancel" name="SignUp">
</td>
</tr>

								<tr>
								<th>
							    Not registered? 
								</th>
								<td>
								<a href="register.php"> Create an account </a>
								</td>
								</tr>
</table>
 
</form>
 
</body>
</html>
				
				
				
				</div>
			 </div> 
           <div id ="footer"> 
		     <center>
			<h3 style = "line-height:50px; color:white;"> Copyright &copy; 2017-<?php echo date('Y'); ?>.
			</h3> </center>
		
		   </div>
		</div>
 </body>
</html>




