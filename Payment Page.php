<?php
	include_once"config.php";
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
		$row = $result->fetch_assoc();
		$email = $row['Email'];
		$pnumber = $row['Phonenumber'];
		$address = $row['Address'];
	}	
	
?>
<?php
	// Retrieve records from the database in reverse order
	$sql = "SELECT * FROM order_details WHERE username = '$username' ORDER BY ID DESC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$price = $row['Bookprice'];	
		$quantity = $row['Quantity'];
	}
	
	if (isset($_POST['pay'])) {
		$total = $_POST['fulltotal'];
		$method = $_POST['method'];		

		// Update the user's details in the database
		$updateSql = "UPDATE order_details SET Totalprice = '$total', Paymentmethod = '$method'";
		if ($conn->query($updateSql) === TRUE) {
			// Update successful
			echo "<script>alert('Successfully!')</script>";			
		} else {
			// Error occurred during update
			echo "<script>alert('Error: ')</script>" . $conn->error;
		}
	}
	$conn->close();
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
			<li class="headerli"><a href="Register page.php">Register</a></li>
			<li class="headerli"><a href="Category page All.php">Category</a></li>
			<li class="headerli"><a class="active" href="#">Payment</a></li>
			<li class="headerli"><a href="Contact us.php">Contact Us</a></li>
			<li class="headerli"><a href="FAQ.php">FAQ</a></li>
			<li class="headerli"><a href="About page.php">About Us</a></li>
		</ul>
		
		<!-- Content -->
		<table style="width:100%; border-spacing: 20px;">
			<tr>
				<td colspan="2" style="padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">Delivery Address:</p>					
				</td>
				<td style="font-size:15px; font-family: Arial; font-weight: bold; border: 1px solid black; padding: 10px; color: white;	background-color: #000066; border-radius: 40px;">
					<center><p id="demo"></p></center>

					<script>
						const d = new Date();
						document.getElementById("demo").innerHTML = d;
					</script>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="border: 3px solid; border-color: #000066; padding: 10px;">
					<table style="font-size:15px; font-family: Arial; font-weight: bold;">
							<tr>
								<td>
									Delivey to: 
								</td>
								<td>
									<textarea id="address" rows="4" cols="20" readonly><?php echo $address ?></textarea>
								</td>
							</tr>
							<tr>
								<td>
									Conatct Details:  
								</td>
								<td>
									<input type="text" value="<?php echo $pnumber ?>" name="pnum" readonly>
								</td>
							</tr>
							<tr>
								<td>
									Email:   
								</td>
								<td>
									<input type="text" value="<?php echo $email ?>" name="email" readonly>
								</td>
							</tr>
					</table>					
				</td>
			</tr>
			<tr>
				<td style="width:40%; padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">Book Store Promotion:</p>					
				</td>
				<td style="width:40%; padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">Order Summary:</p>					
				</td>
			</tr>
			<tr>
				<td style="font-size:15px; font-family: Arial; font-weight: bold; border: 3px solid; border-color: #000066; padding: 10px;">
					Voucher: Not Available<br><br>
					Promo Code: <input type="text" value=" " name="promo" readonly>
				</td>
				<td rowspan="2" style="border: 3px solid; border-color: #000066; padding: 10px;">
					<table style="font-size:15px; font-family: Arial; font-weight: bold; border-spacing: 20px;">
							<tr>
								<td>
									Item total
								</td>
								<td>									
									<p id="total"></p>
									<script>
										var price = parseInt("<?php echo $price; ?>");
										var quantity = parseInt("<?php echo $quantity; ?>");
										
										var total = price * quantity;
										document.getElementById('total').innerHTML = total.toFixed(2);
									</script>
								</td>
							</tr>
							<tr>
								<td>
									Delivery Fees									
								</td>
								<td>
									 <p id="delivery">500.00</p>
								</td>
							</tr>
							<tr>
								<td>
									Total Payment 									
								</td>
								<td>
									<p id="fulltotal"></p>	
									<script>
										var price = parseInt("<?php echo $price; ?>");
										var quantity = parseInt("<?php echo $quantity; ?>");
										
										var total = price * quantity;									
										
										var fulltotal = total + 500;
										document.getElementById('fulltotal').innerHTML = fulltotal.toFixed(2);
									</script>
									 
								</td>
							</tr>						
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding: 10px;">
					<p style="font-size:18px; font-family: Arial; font-weight: bold;">Payment Method:</p>					
				</td>
			</tr>
			<tr>
				<form action="" method="POST">
					<td style="font-size:15px; font-family: Arial; font-weight: bold; border: 3px solid; border-color: #000066; padding: 10px;">
						Total Payment:&emsp;<input type="text" name="fulltotal" readonly><br><br>
						<script>
							var price = parseInt("<?php echo $price; ?>");
							var quantity = parseInt("<?php echo $quantity; ?>");
										
							var total = price * quantity;									
										
							var fulltotal = total + 500;
							document.getElementsByName("fulltotal")[0].value = fulltotal.toFixed(2);
						</script>
						
						Cash on delivery <input type="radio" name="method" value="Cash on delivery"checked><br><br>
						Credit/Debit Card<input type="radio" name="method" value="Credit/Debit Card"><br><br>
						<input type="submit" name="pay" class="buyb" value="Pay">
					</td>
				</form>
			</tr>			
		</table>
				
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