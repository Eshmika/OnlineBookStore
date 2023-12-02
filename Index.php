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
			<li class="headerli"><a class="active" href="#">Home</a></li>
			<li class="headerli"><a href="Account Page.php">User Account</a></li>
			<li class="headerli"><a href="Register page.php">Register</a></li>
			<li class="headerli"><a href="Category page All.php">Category</a></li>
			<li class="headerli"><a href="Payment Page.php">Payment</a></li>
			<li class="headerli"><a href="Contact us.php">Contact Us</a></li>
			<li class="headerli"><a href="FAQ.php">FAQ</a></li>
			<li class="headerli"><a href="About page.php">About Us</a></li>
		</ul>
		
		<!-- Content -->
		<br/>				
		<img src= "images\slide.gif" alt="Slide" width=100% height="350px">
		<br><br><br>
		<!-- NEW PRODUCTS booktable -->
		<p style="font-size:18px; font-family: Arial; font-weight: bold;">NEW PRODUCTS</p>
		<table style="font-size:15px; font-family: Arial; font-weight: bold; text-align: center; width:100%;">
			<tr>
				<td class="hometd" style="width:20%;">
					<img src="images\book1.jpg" alt="Book" height="200px"><br>
					A PASSAGE NORTHLKR <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR2,695.00</p>
					<a href="Passage Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book2.jpg" alt="Book" height="200px"><br>
					HOW THE MIGHTY FALL <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR4,045.00</p>
					<a href="Mighty Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" tyle="width:20%;">
					<img src="images\book3.jpg" alt="Book" height="200px"><br>
					IKIGAI <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR2,475.00</p>
					<a href="Ikigai Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book4.png" alt="Book" height="200px"><br>
					DEATH - AN INSIDE STORY <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR1,345.00</p>
					<a href="Death Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book5.png" alt="Book" height="200px"><br>
					CHINAMAN <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR2,475.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
			</tr>			
		</table>
		<br><br><br>
		
		<!-- SHORT STORY booktable -->
		<p style="font-size:18px; font-family: Arial; font-weight: bold;">SHORT STORY</p>
		<table style="font-size:15px; font-family: Arial; font-weight: bold; text-align: center; width:100%;">
			<tr>
				<td class="hometd" style="width:20%;">
					<img src="images\book6.png" alt="Book" height="200px"><br>
					TATTOOED SHERLOCK <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR1,125.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book7.png" alt="Book" height="200px"><br>
					LOST IN RETIREMENT AND OTHER STORIES <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR540.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book8.jpg" alt="Book" height="200px"><br>
					NOT SO PERFECT <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR315.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book9.png" alt="Book" height="200px"><br>
					A COLLECTION OF SHORT STORIES AND POEMS <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR225.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book10.png" alt="Book" height="200px"><br>
					ONCE UPON A TIME IN THE NORTH HC <p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR2,227.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
			</tr>			
		</table>
		<br><br><br>
		
		<!-- EDUCATION booktable -->
		<p style="font-size:18px; font-family: Arial; font-weight: bold;">EDUCATION</p>
		<table style="font-size:15px; font-family: Arial; font-weight: bold; text-align: center; width:100%;">
			<tr>
				<td class="hometd" style="width:20%;">
					<img src="images\book11.png" alt="Book" height="200px"><br>
					BRILLIANT BTAIN ACTIVITY BOOK<p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR1,242.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book12.png" alt="Book" height="200px"><br>
					SCRABBLE JUNIOR SPELLING ACTIVITY BOOK<p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR450.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book13.png" alt="Book" height="200px"><br>
					COLLINS BIG BOOK OF CROSSWORDS<p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR450.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book14.png" alt="Book" height="200px"><br>
					THE TIMES ULTIMATE KILLER SU DOKU BOOK<p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR450.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
				<td class="hometd" style="width:20%;">
					<img src="images\book15.png" alt="Book" height="200px"><br>
					SCRABBLE JUNIOR SPELLING ACTIVITY BOOK<p style="font-size:18px; color: #e67300; margin-top: 8px; margin-bottom: 0px;">LKR450.00</p>
					<a href="Chinaman Detail page.php"><button type="submit" class="buyb">Buy</button></a>
				</td>
			</tr>			
		</table>
		<br>
				
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
					</center>
				</td>
			</tr>
		</table>		
	</body>
</html>