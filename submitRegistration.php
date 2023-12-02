<?php
	include_once"config.php";
?>
<?php
	$fname=$_POST["field1"];
	$lname=$_POST["field2"];
	$dob=$_POST["field3"];
	$email=$_POST["field4"];
	$pnumber=$_POST["field5"];
	$address=$_POST["field6"];
	$gender=$_POST["field7"];
	$acc=$_POST["field8"];
	$username=$_POST["field9"];
	$password=$_POST["field10"];
	
	$sql="insert into customer_details(ID,Fisrt_name,Last_name,DOB,Email,Phonenumber,Address,Gender,Acc_type,Username,Password)values('','$fname','$lname','$dob','$email','$pnumber','$address','$gender','$acc','$username','$password')";
	
	if(mysqli_query($conn,$sql)){
		echo"<script>alert('Record inserted sucessfully')</script>";
		header("Location:Login page.php");
	}else{
		echo"<script>alert('Error in insertion')</script>";
	}
	
	//close the connection
	mysqli_close($conn);
?>