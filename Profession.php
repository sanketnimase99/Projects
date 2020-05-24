<?php
error_reporting(0);
 include("includes/db.php");

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
				     <form action="Profession.php" method="post" name="form1">
					
					
							  <center>
							   <br>
				 <h2>PROFESSION DETAILS</h2>
				  <br>
							<table>
							  
									<tr>
											<td>Enrollment No</td>
							                 <td><input type="text" name="enroll" value="<?php if(!isset($_POST['Profession'])) echo $_GET['no']; else echo $_POST['enroll'] ; ?>"
							        </tr>
							       <tr>
											<td>Select Profession</td>
											<td>
													<select name="Profession"  onchange="javascript: document.form1.submit()" value="Hello" >
															<option Value="<?php 	if(isset($_POST['Profession'])) { echo $_POST['Profession'];}?>"><?php 	if(isset($_POST['Profession'])) { echo $_POST['Profession'];}?></option>
															<option value="Bussinessmen">Bussinessmen</option>
															<option value="Employee">Employee</option>
															<option Value="Non-Employee">Non-Employee</option>
												
											       </select>
											</td>
										</tr>
							    
							    <?php
									if(isset($_POST['Profession']))
												{
													
													$Profession = $_POST['Profession'];
													
													if($Profession=='Bussinessmen')
													{
														echo "<tr>";
														echo "<td>Bussines Name : </td>";
														echo "<td><input type='text' name='company'></td>";
														echo "</tr>";
														
														echo "<tr>";			
														echo "<td>Current Location</td>";
														echo "<td><input type='text' name='location'></td>";
														echo "</tr>";
														
														echo		"<tr>";
														echo		"<td colspan='2' style='align:center;'><input type='submit' value='Insert' name='Add1'>";
														echo		"</tr>";
														
											    }
										
													
													if($Profession=='Employee')
													{
														echo "<tr>";
														echo "<td>Company Name : </td>";
														echo "<td><input type='text' name='company'></td>";
														echo "</tr>";
														
														echo "<tr>";
														echo "<td>Job Role</td>";
														echo "<td><input type='text' name='role'></td>";
														echo "</tr>";
														
														echo "<tr>";			
														echo "<td>Current Location</td>";
														echo "<td><input type='text' name='location'></td>";
														echo "</tr>";
														
															echo		"<tr>";
															echo		"<td colspan='2' style='align:center;'><input type='submit' value='Insert' name='Add2'>";
															echo		"</tr>";
													}
													
													if($Profession=='Non-Employee')
													{
																echo "<tr>";			
																echo "<td>Current Location</td>";
																echo "<td><input type='text' name='location'></td>";
																echo "</tr>";
															
															echo		"<tr>";
															echo		"<td colspan='2' style='align:center;'><input type='submit' value='Insert' name='Add3'>";
															echo		"</tr>";
													}
												}	

										?>
									
							        
							</table>
							  </center>
				   
				   </form>

				</div>
			 </div> 

		
			 <div id ="footer"> 
			   <center><h3 style = "line-height:50px; color:white;"> Copyright &copy; 2017-<?php echo date('Y'); ?>.
			</h3> </center>
		
			 </div>
			 
		 </div>

	</body>
</html>

<?php
	
if(isset($_POST['Add2']))
{
    $no = $_POST['enroll'];
	$company = $_POST['company'];
	$job = $_POST['role'];
	$location= $_POST['location'];
	
	$sql = "insert into Profession values('$no','$company','$job','$location','Employee')";
	mysqli_query($con,$sql);
	
	echo "<script>alert('Successfully Insert'); window.location = './account.php';</script>";
}
			

if(isset($_POST['Add1']))
{
    $no = $_POST['enroll'];
	$company = $_POST['company'];
    $location= $_POST['location'];
	
	$sql = "insert into Profession values('$no','$company','None','$location','Business')";
	mysqli_query($con,$sql);
	
	echo "<script>alert('Successfully Insert'); window.location = './account.php';</script>";
}
if(isset($_POST['Add3']))
{
    $no = $_POST['enroll'];
 $location= $_POST['location'];
	
	$sql = "insert into Profession values('$no','None','None','$location','Non Employee')";
	mysqli_query($con,$sql);
	
	echo "<script>alert('Successfully Insert'); window.location = './account.php';</script>";
}
?>



