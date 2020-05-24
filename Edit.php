<?php
session_start();
if($_SESSION['Eno']==false)
{
	header('location:account.php');
}
include("includes/db.php");

   $no = $_SESSION['Eno'];
 
    $sql1 = "select * from register where eno  = '$no'";
	
	$result1 = mysqli_query($con,$sql1);


if(isset($_POST['Insert']))
{
	
    $Eno = $_POST['Eno'];
	 
	 $Password  =$_POST['Password'];	 
	 $Cpassword  =$_POST['Cpassword'];	

	$Email = $_POST['Email'];	
	$Mobile = $_POST['Mobile'];	


	$Address = $_POST['Address'];	
	
	$City = $_POST['City'];	
	$State = $_POST['State'];	
	
	$Country = $_POST['Country'];
	
	$sql = "select * from Enrollment where eno  = '$Eno'";
	
	$result = mysqli_query($con,$sql);
	
   $sql = "update register set Email='$Email' ,Mobile='$Mobile' , Address='$Address' ,City='$City',State='$State',Country='$Country',Password='$Password',Cpassword='$Cpassword'where Eno ='$Eno'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);
	
	header('Location:UpdateProfession.php');
}
?>

<html>
	<head>
		<title>Alumni Registration System</title>
		  
		<link rel = "stylesheet" href ="styles/abc.css" media = "all">
		
		<script>
		
			function validateform()
			{  
					var name=document.myform.Fname.value; 
					var lastname=document.myform.Lname.value; 

					
					var firstpassword=document.myform.Password.value;  
					var secondpassword=document.myform.Cpassword.value;

				    var passing=document.myform.Pyear.value; 	
					var num=document.myform.Mobile.value;  
					
					var x=document.myform.Email.value;  
				    var atposition=x.indexOf("@");  
					 var dotposition=x.lastIndexOf(".");  	
					
					
					if (name=="")
					{  
						alert("First Name can't be blank");  
						return false;  
					}
					
					if (lastname=="")
					{  
						alert("Last Name can't be blank");  
						return false;  
					}
					
					
					if(firstpassword!=secondpassword)
					{  
							alert("Password and Confirm Password should be same");
							return false;  
					}  
				   
				   if ((document.getElementById("Dob1").selectedIndex == 0)||(document.getElementById("Dob2").selectedIndex == 0)||(document.getElementById("Dob3").selectedIndex == 0))
						{
							alert("Select the Birth date");
							return false;
						}
						
			
				   	if (passing=="")
					{  
						alert("passing year should not be blabk");  
						return false;  
					}
					
					if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length)
						{  
							alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
							return false;  
						}  
					
					
					
			
				if (num=="")
					{  
						alert("Mobile no should not be blank");  
						return false;  
					}
			
				if (isNaN(num))
					{  
							alert("Mobile number should be in number");
							return false;  
					}
	
        	if(num.length != 10) 
			{
				alert("Mobile number must be 10 digits.");
					return false;
			}
			
			if ( (myform.Gender[0].checked == false ) && (myform.Gender[1].checked == false ) )
			{
				alert ( "Please choose your Gender: Male or Female" );
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
<title>Your Details</title>

</head>
 

<form name="myform"action="Edit.php" method="post" onsubmit="return validateform()">
<h4><center> <br>
 <h2>YOUR DETAILS</h2>
</center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="account.php">SignOut</a>
</h4>
<br>
 <center>
<table >
<?php while($row = mysqli_fetch_array($result1))
{?>
 <!----- Enrollment No ---------------------------------------------------------->
 <tr>
<td>Enrollment No</td>
<td><input type="text" name="Eno"  readonly value="<?php echo  $row['Eno'];?> " />

</td>
</tr>
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>FIRST NAME</td>
<td><input type="text" name="Fname" readonly value="<?php echo  $row['Fname'];?> " />

</td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->
<tr>
<td>LAST NAME</td>
<td><input type="text" name="Lname" readonly value="<?php echo  $row['Lname'];?> " />

</td>
</tr>

<!----- Enter Password ---------------------------------------------------------->
<tr>
<td>Password</td>
<td><input type="text" name="Password"  value="<?php echo  $row['Password'];?> " />

</td>
</tr>

<!----- Enter Confirm Password ---------------------------------------------------------->
<tr>
<td>Confirm Password</td>
<td><input type="text" name="Cpassword"  value="<?php echo  $row['Password'];?> " />

</td>
</tr>
 
<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td>DATE OF BIRTH</td>
    <td><input type="text" readonly value="<?php echo  $row['Dob'];?> " />
<td>

</td>
</tr>
 
 <!----- Passing Year---------------------------------------------------------->
<tr>
<td>PASSING YEAR</td>
<td><input type="text" name="Pyear" readonly value="<?php echo  $row['Pyear'];?> " />
</td>
</tr>
 
 
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>EMAIL ID</td>
<td><input type="email" name="Email" value="<?php echo  $row['Email'];?> " />
</td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="Mobile"  value="<?php echo  $row['Mobile'];?> " />

</td>
</tr>
 
<!----- Gender ----------------------------------------------------------->
<tr>
<td>GENDER</td>
<td>
 <input type="text" name="Gender" readonly value="<?php echo  $row['Gender'];?> " />

</td>
</tr>
 
<!----- Address ---------------------------------------------------------->
<tr>
<td>ADDRESS <br /><br /><br /></td>
<td><textarea name="Address" rows="4" cols="30" >
<?php echo  $row['Address'];?> 
</textarea></td>
</tr>
 
<!----- City ---------------------------------------------------------->
<tr>
<td>CITY</td>
<td><input type="text" name="City"  value="<?php echo  $row['City'];?> " />

</td>
</tr>
 

 
<!----- State ---------------------------------------------------------->
<tr>
<td>STATE</td>
<td><input type="text" name="State" readonly value="<?php echo  $row['State'];?> " />

</td>
</tr>
 
<!----- Country ---------------------------------------------------------->
<tr>
<td>COUNTRY</td>
<td><input type="text" name="Country" readonly value="<?php echo  $row['Country'];?> " /></td>
</tr>
 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Next" name="Insert">
</td>
</tr>
</table>
<?php }?>
</form>
</body>
</html>
				
				
				
				</div>
			 </div> 
           <div id ="footer"> 
		     <center><h3 style = "line-height:50px; color:white;"> Copyright &copy; 2017-<?php echo date('Y'); ?>.
			</h3> ></center>
		
		   </div>
		</div>
 </body>
</html>




