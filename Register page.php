<?php
	session_start();
		
	if (!isset($_SESSION['username'])) {
		$_SESSION['username']= "Guest";		
	}
	
	// Retrieve the username from the session
	$username = $_SESSION['username'];	
?>
<html>	
	<head>
		<title>Sun Shine Book Shop</title>
		<link rel="stylesheet" href="styles/styles.css">
		<script src ="Js/myScript.js"></script>
	</head>
	<body>
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
			<li class="headerli"><a href="Account Page.php">User Account</a></li>
			<li class="headerli"><a class="active" href="#">Register</a></li>
			<li class="headerli"><a href="Category page All.php">Category</a></li>
			<li class="headerli"><a href="Payment Page.php">Payment</a></li>
			<li class="headerli"><a href="Contact us.php">Contact Us</a></li>
			<li class="headerli"><a href="FAQ.php">FAQ</a></li>
			<li class="headerli"><a href="About page.php">About Us</a></li>
		</ul>
		
		<!-- Content -->
		<form action="submitRegistration.php" method="POST" onsubmit="return checkPassword()">
			<p style="font-size:18px; font-family: Arial; font-weight: bold;"><u>Personal details</u></p>
				<table style="font-size:18px; font-family: Arial; font-weight: bold;">
					<tr>
						<td>Name</td>
						<td><input type="text" name="field1" onfocus="this.value=''" value="First" required> &nbsp <input type="text" name="field2" onfocus="this.value=''" value="Last" required></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input type="date" name="field3" required></td>
					</tr>
					<tr>
						<td>Email Address</td>
						<td><input type="email" name="field4" onfocus="this.value=''" value="sample@gmail.com" pattern="[a-z0-9._+-]+@[a-z0-9._]+.[a-z]{3}" required></td>
					</tr>
					<tr>
						<td>Phone number</td>
						<td><input type="tel" name="field5" placeholder="070-0000000" pattern="[0-9]{10}" required></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><textarea name="field6" rows="5" cols="50" required></textarea></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><input type="radio" name="field7" value="Male"checked> Male
							<input type="radio" name="field7" value="Female"> Female</td>
					</tr>	
					<tr>
						<td>Account type</td>
						<td><input type="radio" name="field8" value="Customer"checked> Customer
							<input type="radio" name="field8" value="Book reviewer"> Book reviewer</td>
					</tr>					
				</table>
				<p style="font-size:18px; font-family: Arial; font-weight: bold;"><u>Login details</u></p>
				<table style="font-size:18px; font-family: Arial; font-weight: bold;">
					<tr>
						<td>Username</td>
						<td><input type="text" name="field9" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" id="pwd" name="field10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" required></td>
					</tr>
					<tr>
						<td>Re-enter Password</td>
						<td><input type="password" id="cnfrmpwd" required></td>
					</tr>					
				</table>
				<p style="font-size:18px; font-family: Arial; font-weight: bold;">
					<input type="checkbox" id="checkbox" onclick="enablebutton()">Accept privacy policy and terms<br><br>
					<input type="submit" id="submitBtn" value="Submit" disabled>
				</p>
		</form>
		<br><br><br><br>
				
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