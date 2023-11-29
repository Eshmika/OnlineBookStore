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
			<li class="headerli"><a href="Register page.php">Register</a></li>
			<li class="headerli"><a href="Category page All.php">Category</a></li>
			<li class="headerli"><a href="Payment Page.php">Payment</a></li>
			<li class="headerli"><a href="Contact us.php">Contact Us</a></li>
			<li class="headerli"><a class="active" href="#">FAQ</a></li>
			<li class="headerli"><a href="About page.php">About Us</a></li>
		</ul>
		
		<!-- Content -->
		<img src ="images\Help Center.jpeg" alt="help center image" class="helpimg">
		<p style="font-family: Arial; font-weight: bold; text-align: center; font-size: 25px;">Frequently Asked Questionsr</p>
					
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : How do I create an account on the online bookstore?</summary>
				<br>A : To create an account, click on the "Sign Up" or "Register" button on the website. Fill out the required information such as your name, email address, and password. Follow the prompts to complete the registration process.
		</details> 	<br><br>
		
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : How do I search for books on the website?</summary>
				<br>A : Look for a search bar on the website. Enter keywords such as book titles, authors, genres, or ISBN numbers to search for specific books. Press Enter or click on the search button to view the search results.
		</details> 	<br><br>
		
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : Can I filter search results by genre, author, or other criteria?</summary>
				<br>A : Yes, online bookstores provide filters to refine search results. Look for options to filter by genre, author, publication date, format (e.g., hardcover, paperback, eBook), price range, and more.
		</details> 	<br><br>
		
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : How do I add books to my shopping cart?</summary>
				<br>A : When viewing a book's details page, you will typically find an "Add to Cart" button. Click on it to add the book to your shopping cart. You can continue browsing and add more books to your cart before proceeding to checkout.
		</details> 	<br><br>
		
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : What payment methods are accepted?</summary>
				<br>A : Online bookstores usually accept major credit cards (Visa, Mastercard, American Express), debit cards, and sometimes alternative payment methods like PayPal or digital wallets. Accepted payment methods are typically displayed on the website.
		</details> 	<br><br>
		
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : Is my personal and payment information secure?</summary>
				<br>A : Reputable online bookstores prioritize the security of customer information. They often use encryption technology (e.g., SSL) to protect your personal and payment details. Look for security symbols or indications like a padlock icon in the browser address bar to ensure a secure connection.
		</details> 	<br><br>
		
		<details style="font-size:18px; font-family: Arial;">
			<summary style="font-size:20px; font-family: Arial; font-weight: bold;">Q : What are the shipping options and costs?</summary>
				<br>A : Shipping options and costs can vary depending on the online bookstore and your location. Look for information regarding shipping methods (e.g., standard, express), estimated delivery times, and associated costs during the checkout process. Some bookstores may offer free shipping for certain order thresholds.
		</details> 	<br><br>
				
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