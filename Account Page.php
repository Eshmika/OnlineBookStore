<?php
	include_once'config.php';
?>
<?php
	session_start();
	
	if (!isset($_SESSION['username'])) {
		$_SESSION['username']= "Guest";		
	}
	
	// Retrieve the username from the session
	$username = $_SESSION['username'];	
			
	if ($username=="Guest") {		
		header("Location:Login page.php"); // Redirect to the login page if not logged in		
	}
?>
<?php
	// Retrieve the user's details from the database
	$sql = "SELECT * FROM customer_details WHERE username = '$username'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// User found, fetch the details
		$row = $result->fetch_assoc();
		$id = $row['ID'];
		$fname = $row['Fisrt_name'];
		$lname = $row['Last_name'];
		$dob = $row['DOB'];
		$email = $row['Email'];
		$pnumber = $row['Phonenumber'];
		$address = $row['Address'];
		$acc = $row['Acc_type'];
	}
	
	// Handle form submission for updating details
	if (isset($_POST['update'])) {
		$newfname = $_POST['fname'];
		$newlname = $_POST['lname'];
		$newdob = $_POST['dob'];
		$newemail = $_POST['email'];
		$newpnumber = $_POST['pnumber'];
		$newaddress = $_POST['address'];
		$newacc = $_POST['acc'];

		// Update the user's details in the database
		$updateSql = "UPDATE customer_details SET Fisrt_name = '$newfname', Last_name = '$newlname', DOB = '$newdob', Email = '$newemail', Phonenumber = '$newpnumber', Address = '$newaddress', Acc_type = '$newacc' WHERE username = '$username'";
		if ($conn->query($updateSql) === TRUE) {
			// Update successful
			echo "<script>alert('Details updated successfully!')</script>";
			// Update the fetched details with the new values
			$fname = $newfname;
			$lname = $newlname;
			$dob = $newdob;
			$email = $newemail;
			$pnumber = $newpnumber;
			$address = $newaddress;
			$acc = $newacc;
		} else {
			// Error occurred during update
			echo "<script>alert('Error updating details: ')</script>" . $conn->error;
		}
	}
	
	// Handle form submission for updating details
	if (isset($_POST['updatebookcategory'])) {
		$checkboxData = $_POST["checkbox_data"];
		$chk="";

		$clearQuery = "DELETE FROM book_category";
		if ($conn->query($clearQuery) === TRUE) {
			foreach($checkboxData as $chk1)  
			{  
			  $chk .= $chk1.",";  
			}
			
			$in_ch=mysqli_query($conn,"insert into book_category(Username,Category) values ('$username','$chk')");  
			if($in_ch==1)  
			{  
				echo'<script>alert("Inserted Successfully")</script>'; 
				header("Location:Category page All.php");
			}  
			else  
			{  
				echo'<script>alert("Failed To Insert")</script>';  
			} 
		}
	}
		
	// Handle account deletion
	if (isset($_POST['delete'])) {
		// Delete the user's account from the database
		$deleteSql = "DELETE FROM customer_details WHERE username = '$username'";
		if ($conn->query($deleteSql) === TRUE) {
			// Account deletion successful
			echo "<script>alert('Account deleted successfully!')</script>";
			// Clear all session variables and destroy the session
			$_SESSION = array();
			session_destroy();
			// Redirect to the login page
			header("Location:Login page.php");
			exit();
		} else {
			// Error occurred during deletion
			echo "<script>alert('Error deleting account: ')</script>" . $conn->error;
		}
	}

	// Close the database connection
	$conn->close();
?>
<html>	
	<head>
		<title>Sun Shine Book Shop</title>
		<link rel="stylesheet" href="styles/styles.css">
		<script src ="Js/myScript.js"></script>
	</head>
	<body onload="trackAccess()" >
		<!-- Header -->
		<table class="topnav" style="width:100%; border:1px solid;">
			<tr>
				<td>
					<img src= "images\logo.png" alt="LOGO" width="210px" height="50px">
				</td>
				<td style="width:40%">
					<form>
						<input type="text" placeholder="Search.." class="search">
						<button type="submit" class="searchb"><img src= "images\searchicon.png" alt="search" width="19px" height="19px"></button>
					</form>	
				</td>	
				<td>
					<form><p style="font-size:18px; font-family: Arial; font-weight: bold;">
					<img src= "images\person.png" alt="person" width="19px" height="19px">
					Welcome, <?php echo $username; ?>					
					<button type="submit" class="loginb"><a href="Login page.php">
						<?php
							if($username== "Guest"){
								echo "Login"; 
							}else{
								echo "Logout"; 
							}
						?>
					</a></button>&emsp;&emsp;&emsp;&emsp;&emsp;
					<a href="Payment Page.php"><img src= "images\cart.png" alt="cart" width="24px" height="20px"></a>
					Cart
					</p></form>
				</td>	
			</tr>
		</table>
		
		<ul class="headerul">
			<li class="headerli"><a href="index.php">Home</a></li>
			<li class="headerli"><a class="active" href="#">User Account</a></li>
			<li class="headerli"><a href="Register page.php">Register</a></li>
			<li class="headerli"><a href="Category page All.php">Category</a></li>
			<li class="headerli"><a href="Payment Page.php">Payment</a></li>
			<li class="headerli"><a href="Contact us.php">Contact Us</a></li>
			<li class="headerli"><a href="FAQ.php">FAQ</a></li>
			<li class="headerli"><a href="About page.php">About Us</a></li>
		</ul>
		
		<!-- Content -->
		<br>
		<center>
		<table style="width:100%; border-spacing: 20px;">
			<tr>
				<td style="width:50%; padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">User details:</p>
				</td>
				<td style="width:50%; padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">Book Category:</p>
				</td>
			</tr>
			<tr>
				<td style="font-size:15px; font-family: Arial; font-weight: bold; border: 3px solid; border-color: #000066;; padding: 10px;">
					Edit Details
					<img src="images\editIcon.png" alt="cart" height="25px"><br><br>
					<form action="" method="POST" name="form2">
						<table style="font-size:15px; font-family: Arial; font-weight: bold;">
							<tr>
								<td>
									ID
								</td>
								<td>
									<input type="text" value="<?php echo $id ?>" name="id" readonly>
								</td>
							</tr>
							<tr>
								<td>
									First Name
								</td>
								<td>
									<input type="text" value="<?php echo $fname ?>" name="fname" required>
								</td>
							</tr>
							<tr>
								<td>
									Last Name
								</td>
								<td>
									<input type="text" value="<?php echo $lname ?>" name="lname" required>
								</td>
							</tr>
							<tr>
								<td>
									Date of Birth
								</td>
								<td>
									<input type="text" value="<?php echo $dob ?>" name="dob" required>
								</td>
							</tr>
							<tr>
								<td>
									Email
								</td>
								<td>
									<input type="text" value="<?php echo $email ?>" name="email" required>
								</td>
							</tr>
							<tr>
								<td>
									Phone number
								</td>
								<td>
									<input type="text" value="<?php echo $pnumber ?>" name="pnumber" required>
								</td>
							</tr>
							<tr>
								<td>
									Address
								</td>
								<td>
									<textarea name="address" rows="4" cols="50"><?php echo $address ?></textarea>
								</td>
							</tr>
							<tr>
								<td>
									Account type
								</td>
								<td>
									<input type="text" value="<?php echo $acc ?>" name="acc" required>
								</td>
							</tr>
						</table>						
						<input type="submit" class="updateBtn" name="update" value="Save and Update">	
						<input type="submit" class="deleteBtn" name="delete" value="Delete Account">	
					</form>
				</td>
				<td style="font-size:15px; font-family: Arial; font-weight: bold; border: 3px solid; border-color: #000066; padding: 10px;">
					<form action="" method="POST" name="form2">
						<input type="checkbox" name="checkbox_data[]" id="checkbox1" value="Adventure">
						<label for="my-checkbox">Adventure</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox2" value="Novels">
						<label for="my-checkbox">Novels</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox3" value="Historical">
						<label for="my-checkbox">Historical</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox4" value="Fantasy">
						<label for="my-checkbox">Fantasy</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox5" value="Mystery">
						<label for="my-checkbox">Mystery</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox6" value="Thriller">
						<label for="my-checkbox">Thriller</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox7" value="Memoir">
						<label for="my-checkbox">Memoir</label><br><br>
						<input type="checkbox" name="checkbox_data[]" id="checkbox8" value="Science Fiction">
						<label for="my-checkbox">Science Fiction</label><br><br>
						<input type="submit" name="updatebookcategory" class="updateBtn" value="Update the book category">
					</form>
				</td>
			</tr>
			<tr>
				<td style="padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">Login Activity:</p>				
				</td>
			</tr>
			<tr>
				<td style="font-size:15px; font-family: Arial; font-weight: bold; border: 3px solid; border-color: #000066; padding: 10px;">
					First Access: <span id="firstAccess"></span><br><br>
					Last Access: <span id="lastAccess"></span>
				</td>				
			</tr>
		</table>
		</center>
		
		<!-- Footer -->
		<ul class="headerul">
			<li class="headerli"><a href="https://www.facebook.com/login/"><img src= "images\facebook.png" alt="Facebook" height="25px"></a></li>
			<li class="headerli"><a href="https://twitter.com/login?lang=en"><img src= "images\twitter.png" alt="twitter" height="25x"></a></li>
			<li class="headerli"><a href="https://www.instagram.com/accounts/login/"><img src= "images\instagram.jpg" alt="instagram" height="25px"></a></li>
			<li class="headerli"><a href="https://www.tiktok.com/login"><img src= "images\tiktok.png" alt="tiktok" height="26px"></a></li>			
		</ul class="headerul">
		
		<table class="footernav" style="width:100%;">
			<tr>
				<td style="width:25%;">
				<p style="font-size:18px; font-family: Arial; font-weight: bold; color:#6699ff;">Sun Shine Book Shop</p>
				<p style="font-size:12px; font-family: Arial; color:white;">Nowadays, reading books is becoming more popular among the young generation, so we have made it easy for our customers to get them through our website. In that platform we can purchase lot of books. This is very famous now. Because more than 3 billion people use internet and they most like buy things online. It is also important to have a clean and professional website design that caters to the target audience.</p>
				</td>
				<td style="width:12%;">
				<ul class="footerul">
					<li class="footerli"><a href="Account Page.php">User Account</a></li>
					<li class="footerli"><a href="Register page.php">Register</a></li>
					<li class="footerli"><a href="Category page All.php">Category</a></li>			
				</ul>
				</td>
				<td style="width:12%;">
				<ul class="footerul">
					<li class="footerli"><a href="Payment Page.php">Payment</a></li>
					<li class="footerli"><a href="Contact us.php">Contact Us</a></li>
					<li class="footerli"><a href="About page.php">About Us</a></li>
				</ul>
				</td>
				<td style="width:12%;">
				<ul class="footerul">
					<li class="footerli"><a href="FAQ.php">FAQ</a></li>					
				</ul>
				</td>
				<td>
					<center>
					<p style="font-size:14px; font-family: Arial; font-weight: bold; color:white;">Payment Methods</p>
					<img src= "images\cod.png" alt="COD" height="40px">
					<img src= "images\visa.png" alt="Card" height="40px">
					<img src= "images\master.png" alt="Card" height="40px">	
					<center>
				</td>
			</tr>
		</table>
	</body>
</html>