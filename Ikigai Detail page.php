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
?>
<?php
	if (isset($_POST['buy'])){
		$quantity=$_POST['quantity'];	
		$username = $_SESSION['username'];
		
		$sql="insert into order_details(ID,Username,Bookname,Bookprice,Quantity,Totalprice,Paymentmethod)values('','$username','IKIGAI','2475','$quantity','','')";
		
		if(mysqli_query($conn,$sql)){
			header("Location:Payment Page.php");			
		}else{
			echo"<script>alert('Error')</script>";
		}
		
		//close the connection
		mysqli_close($conn);
	}
?>
<html>	
	<head>
		<title>Sun Shine Book Shop</title>
		<link rel="stylesheet" href="styles/styles.css">
		<link rel="stylesheet" href="styles/Bookpage style.css">
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
			<li class="headerli"><a href="FAQ.php">FAQ</a></li>
			<li class="headerli"><a href="About page.php">About Us</a></li>
		</ul>
		
		<!-- Content -->
		<div class="row">
			<div class="column1">
			<img class="img" src="images\book3.jpg" alt="book">
			</div>
		
			<div class="column2">
			<p class="para1"><b>Book Name</b>: IKIGAI <br><br>
				<b>Language</b>: English<br><br>
				<b>Author </b>: Hector Garcia<br><br>
				<b>Publisher</b> : Hutchinson & co.publisher<br><br>
				<b>ISBN</b> : 9781786330895<br><br>
				</p>

			</div>
		</div>
	
		<fieldset>
			<legend><b>Details</b></legend>
			<p style="text-align:justify;">
			It's the Japanese word for reason to live or reason to jump out of bed in the morning. Its the place where your needs, desires, ambitions, and satisfaction meet. A place of balance. Small wonder that finding your ikigai is closely linked to living longer. Finding your ikigai is easier than you might think. This book will help you work out what your own ikigai really is, and equip you to change your life. You have a purpose in this world: your skills, your interests, your desires and your history have made you the perfect candidate for something. All you have to do is find it.
			</p>
		</fieldset>
		
		<form action="" method="POST" class="form1">
			<p><b>Price : LKR2,475.00</b></p>
			<label for="quantity">Quantity&emsp;&emsp;&emsp;</label>
			<select id="quantity" name="quantity">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select><br><br>
			<input type="submit" name="buy" class="btn1" value="Buy Now">
		</form>
		
		<h2 class="para3">Book Reviews</h2>
		
		<p class="review"> If ever there was a book to help you step back, slow down and contemplate on the meaning of life, this would be it. The pace is unhurried and that is exactly how you should read the book. Not in a single sitting but over a week or ten days. Savour each chapter, make notes, write things down when they touch a chord. Ikigai helps you understand so many beautiful things in the sheer simplicity in which it's conveyed. In an increasingly cynical world, we all need ikigai.</p>
		
		<h2 class="para3">Put a review</h2>
		<textarea id="review1" name="review1" placeholder="Type something.." cols="40" rows="5"></textarea><br><br>
		<button class="btn2">Submit</button></p>
		<br><br><br>
				
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