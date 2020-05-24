<?php
session_start();
if($_SESSION['Eno']==false)
{
	header('location:account.php');
}
   include("includes/db.php");

   $no = $_SESSION['Eno'];
 
    $sql1 = "select * from profession where Eno  = '$no'";
	
	$result1 = mysqli_query($con,$sql1);


/*if(isset($_POST['Insert']))
{
	echo "<script>alert('Hello')</script>";
	$str = $_POST['Profession'];
	echo "<script>alert($str)</script>";
	if($str=="Bussinessmen")
	{
		echo "<script>alert('Hello')</script>";
		$sql = "update profession set proff = '$str' where Eno = '$no'";
		mysqli_query($con,$sql);
		echo "<script>alert('Profile Update')</script>";
		header('Location:Edit.php');
	}
	if($str=="Employee")
	{
		echo "<script>alert('Hello')</script>";
	}
	if($str=="Non-Employee")
	{
	echo "<script>alert('Hello')</script>";
	}
}*/
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
				
					<html>
<head>
<title>Your Details</title>

</head>
 

<form name="myform" action="UpdateProfession.php" method="post">
<center>
				 <br>
				 <h2>YOURS DETAILS</h2>
 </center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php">SignOut</a></h4>
<br>
 <center>
<table >
<?php while($row = mysqli_fetch_array($result1))
{?>
 <!----- Enrollment No ---------------------------------------------------------->
 <tr>
<td>Current Proffession</td>
<td><input type="text" name="Proffession"  readonly value="<?php echo  $row['proff'];?> " />

</td>
</tr>
 

 <tr>
<td>Do You Want TO Update Proffession</td>
<td>
   Yes <input type="radio" name="Yes" onchange="javascript: document.myform.submit()"  value="Yes" <?php if (isset($_POST['Yes']) && $_POST['Yes'] == "Yes") echo 'checked="checked"';?>>
   No <input type="radio" name="Yes" onchange="javascript: document.myform.submit()" value="No" <?php if (isset($_POST['Yes']) && $_POST['Yes'] == "No") echo 'checked="checked"';?>>
</td>
</tr>


<?php
if(isset($_POST['Yes']))
	{
		$value = $_POST['Yes'];
		if($value=="No")
		{ 
			echo "<tr><td><a href='edit.php' style='Color:blue;'>GO BACK</a></td></tr>";
		}else
		{
	
                echo "<tr>";
				echo "<td>Select Profession</td>";
				echo "<td>";
				echo "<select name='Profession' onchange='javascript: document.myform.submit()'>";
				echo "<option Value='Select Profession'>";
				if(isset($_POST['Profession'])) 
				{
					echo $_POST['Profession'];
				}else
				{
					echo "Select Profession";
				}					
				echo "</option>";
				echo "<option value='Bussinessmen'>Bussinessmen</option>";
				echo "<option value='Employee'>Employee</option>";
				echo "<option Value='Non-Employee'>Non-Employee</option>";
				echo "</select>";
				echo "</td>";
				echo "</tr>";
		}
	}

	
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
														echo		"<td colspan='2' style='align:center;'><input type='submit' value='Update' name='Add1'>";
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
															echo		"<td colspan='2' style='align:center;'><input type='submit' value='Update' name='Add2'>";
															echo		"</tr>";
													}
													
													if($Profession=='Non-Employee')
													{
																echo "<tr>";			
																echo "<td>Current Location</td>";
																echo "<td><input type='text' name='location'></td>";
																echo "</tr>";
															
															echo		"<tr>";
															echo		"<td colspan='2' style='align:center;'><input type='submit' value='Update' name='Add3'>";
															echo		"</tr>";
													}
												}
if(isset($_POST['Add2']))
	{
		
		$company = $_POST['company'];
		$job = $_POST['role'];
		$location= $_POST['location'];
		$sql = "update profession set proff = 'Employee',Company = '$company' , JobRoll = '$job',Location = '$location' where Eno = '$no'";
		mysqli_query($con,$sql);
		
      echo "<script>alert('Successfully Updated'); window.location = './UpdateProfession.php';</script>";
	}
			

if(isset($_POST['Add1']))
	{
		$company = $_POST['company'];
		$location= $_POST['location'];
		$sql = "update profession set proff = 'Bussinessmen',Company = '$company' , JobRoll = 'None',Location = '$location' where Eno = '$no'";
	
		mysqli_query($con,$sql);
	
		echo "<script>alert('Successfully Updated'); window.location = './UpdateProfession.php';</script>";
	}
if(isset($_POST['Add3']))
	{
		$location= $_POST['location'];
		$sql = "update profession set proff = 'Non-Employee',Company = 'None' , JobRoll = 'None',Location = '$location' where Eno = '$no'";
		mysqli_query($con,$sql);

		mysqli_query($con,$sql);
		echo "<script>alert('Successfully Updated'); window.location = './UpdateProfession.php';</script>";
	}
?>





 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">


</td>
</tr>
</table>
<?php } ?>
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




