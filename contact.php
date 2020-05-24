<?php
include("Includes/db.php");

?>
<html>
	<head>
		<title>Alumni Registration System</title>
		
		<link rel = "stylesheet" href ="styles/abc.css" media = "all">	
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
				
				
<form name="myform"action="contact.php" method="post" >
<center>
				 <br>
				 <h2>CONTACT FORM</h2>
 </center>
<br>
				 <center>
				 <table width="450px" align="center">
							<tr>
							 <td valign="top">
							  <label for="first_name">First Name </label>
							 </td>
							 <td valign="top">
							  <input  type="text" name="first_name" maxlength="50" size="30" required />
							 </td>
							</tr>

							<tr>
							 <td valign="top">
							  <label for="email">Email Address </label>
							 </td>
							 <td valign="top">
							  <input  type="email" name="email" maxlength="80" size="30" required/>
							 </td>
							</tr>
						
							<tr>
								<td>MOBILE NUMBER</td>
									<td>
										<input type="text" name="Mobile" maxlength="10" required />
									
									</td>
							</tr>
									<tr>
									 <td valign="top">
									  <label for="comments">Comments *</label>
									 </td>
									 <td valign="top">
									  <textarea  name="comments" maxlength="1000" cols="25" rows="6" required></textarea>
									 </td>
									</tr>
									
								<tr>
								 <td colspan="2" style="text-align:center">
								  <input type="submit" value="Submit" name="OK">    </td>
								</tr>
</table>
</form>		 
	 </div>
			 </div> 

		
			 <div id ="footer"> 
			   <center>
			   <h3 style = "line-height:50px; color:white;"> Copyright &copy; 2017-<?php echo date('Y'); ?>.
			</h3> 
			   </center>
		
			 </div>
			 
		 </div>

	</body>
</html>

<?php

if(isset($_POST['OK']))
{
        $Name = $_POST['first_name'];
		$Email = $_POST['email'];
		$Telephone = $_POST['Mobile'];
		$Message = $_POST['comments'];
		
		$sql = "insert into contact values('$Name','$Email','$Telephone','$Message')";
		mysqli_query($con,$sql);
		
		echo "<script>alert('COMMENT SEND SUCCESSFULY...!!')</script>";
		mysqli_close($con);
	
}
?>
