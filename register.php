<?php
include("includes/db.php");
if(isset($_POST['Insert']))
{
	
    $Eno = $_POST['Eno'];
	 
  	 $Fname  =$_POST['Fname'];	 
	 $Lname  =$_POST['Lname'];	 
	 
	 $Password  =$_POST['Password'];	 
	 $Cpassword  =$_POST['Cpassword'];	

	$Dob = $_POST['Dob1'].$_POST['Dob2'].$_POST['Dob3'];
    $Pyear = $_POST['Pyear'];	
	
	$Email = $_POST['Email'];	
	$Mobile = $_POST['Mobile'];	


	$Address = $_POST['Address'];	
	
	$City = $_POST['City'];	
	$State = $_POST['State'];	
	
	$Country = $_POST['Country'];
	
	$sql = "select * from Enrollment where eno  = '$Eno'";
	
	$sql1 = "select * from register where eno = '$Eno'";
	
	$result = mysqli_query($con,$sql);
	
	$result1 = mysqli_query($con,$sql1);
	
	 $n = mysqli_num_rows($result);
	 
	 $n1 = mysqli_num_rows($result1);
	
	
	if($n>0)
	{
	
	    if($n1>0)
		{
			echo "<script>alert ('Record already Exist')</script>";
		}else
		{
			$sql = "insert into register(Eno,Fname,Lname,Password,Cpassword,Dob,Pyear,Email,Mobile,Gender,Address,City,State,Country) values('$Eno','$Fname','$Lname','$Password','$Cpassword','$Dob','$Pyear','$Email','$Mobile','Male','$Address','$City','$State','$Country')";
	
			mysqli_query($con,$sql);
			
			header("location:Profession.php?no=$Eno");
		}
	
	
	}else
	{
		echo "<script>alert('Invalid Enrollment no')</script>";
	}
	mysqli_close($con);
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
				    <b>Latest News
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					

				
					</b>
				</marquee>
				</div>
				
				
				
			       <div id = "content_area"> 
				
					<html>
<head>
<title>Alumni Registration Form</title>

</head>
 

<form name="myform" action="register.php" method="post" onsubmit="return validateform()">
<center>
				 <br>
				 <h2>ALUMNI REGISTRATION FORM</h2>
 </center>
<br>
 <center>
<table >

 <!----- Enrollment No ---------------------------------------------------------->
 <tr>
<td>ERP NO</td>
<td><input type="text" name="Eno" maxlength="30" required/>
</td>
</tr>
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>FIRST NAME</td>
<td><input type="text" name="Fname" maxlength="30" required/>
</td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->
<tr>
<td>LAST NAME</td>
<td><input type="text" name="Lname" maxlength="30" required />

</td>
</tr>

<!----- Enter Password ---------------------------------------------------------->
<tr>
<td>PASSWORD</td>
<td><input type="password" name="Password" maxlength="30" required/>
</td>
</tr>

<!----- Enter Confirm Password ---------------------------------------------------------->
<tr>
<td>CONFIRM PASSWORD</td>
<td><input type="password" name="Cpassword" maxlength="30" required/>
</td>
</tr>
 
<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td>DATE OF BIRTH</td>
 
<td>
<select name="Dob1" id="Dob1" required>
<option value="-1">Day:</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
 
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
 
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
 
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
 
<select id="Dob2" name="Dob2" required>
<option value="-1">Month:</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">Jun</option>
<option value="July">Jul</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>
 
<select name="Dob3" id="Dob3" >
 
<option value="-1">Year:</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
 
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
 
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
</select>
</td>
</tr>
 
 <!----- Passing Year---------------------------------------------------------->
<tr>
<td>PASSING YEAR</td>
<td><input type="text" name="Pyear" maxlength="100" required /></td>
</tr>
 
 
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>EMAIL ID</td>
<td><input type="email" name="Email" maxlength="100" required /></td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="Mobile" maxlength="10" required />
</td>
</tr>
 
<!----- Gender ----------------------------------------------------------->
<tr>
<td>GENDER</td>
<td>
Male <input type="radio" name="Gender" value="Male" />
Female <input type="radio" name="Gender" value="Female" />
</td>
</tr>
 
<!----- Address ---------------------------------------------------------->
<tr>
<td>ADDRESS <br /><br /><br /></td>
<td><textarea name="Address" rows="4" cols="30" required></textarea></td>
</tr>
 
<!----- City ---------------------------------------------------------->
<tr>
<td>CITY</td>
<td><input type="text" name="City" maxlength="30" required/>

</td>
</tr>
 

 
<!----- State ---------------------------------------------------------->
<tr>
<td>STATE</td>
<td><input type="text" name="State" maxlength="30" required/>
</td>
</tr>
 
<!----- Country ---------------------------------------------------------->
<tr>
<td>COUNTRY</td>
<td><input type="text" name="Country" required/></td>
</tr>
 

<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit" name="Insert">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 
</form>
 
</body>
</html>
				</div>
			 </div> 
           <div id ="footer">
		     <center><h3 style = "line-height:50px; color:white;"> Copyright &copy; 2017-<?php echo date('Y'); ?>.
			</h3> </center>
		
		   </div>
		</div>
 </body>
</html>




