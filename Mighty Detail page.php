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
		
		$sql="insert into order_details(ID,Username,Bookname,Bookprice,Quantity,Totalprice,Paymentmethod)values('','$username','HOW THE MIGHTY FALL','4045','$quantity','','')";
		
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
			<img class="img" src="images\book2.jpg" alt="book">
			</div>
		
			<div class="column2">
			<p class="para1"><b>Book Name</b>: HOW THE MIGHTY FALL <br><br>
				<b>Language</b>: English<br><br>
				<b>Author </b>: Jim Collins<br><br>
				<b>Publisher</b> : Rh Business Books<br><br>
				<b>ISBN</b> : 9781847940421<br><br>
				</p>

			</div>
		</div>
	
		<fieldset>
			<legend><b>Details</b></legend>
			<p style="text-align:justify;">
			In the first few centuries after the birth of Christ, the Roman Empire dominated Europe and the Middle East. It was massive, stretching from Portugal in the West to Iran in the East. Among those alive back then, there would have been no doubt: this gigantic, all-powerful empire would last forever. Alas, it did not: within just a few centuries it was gone, banished to the trash heap of history.
			The decline of the Roman Empire shows that, no matter how vast or successful something is, it will always be in danger of collapsing. 
			But what causes decline? What can make a huge entity come crashing down? 
			The decline of a large organization is always self-inflicted: collapse isn’t the fault of outside factors or bad luck; it’s the direct result of mismanagement. 
			Remember how everybody had a Nokia phone 15 years ago? 
			In the years since, the company has gone from being the market leader to having a mere 3 percent market share. Why? 
			While their competitors, such as Apple and Samsung, were researching and innovating in smartphone technology, Nokia’s management decided to innovate in other, less profitable areas. Thus, when smartphones became popular, Nokia was completely out of the race.
			At this point, it’s important to point out that we’re not talking about laziness. Successful firms very rarely collapse because they fail to act: usually it’s because they act in the wrong way. In fact, failing firms often show very high levels of innovation and energy. 
			Bank of America is a great example of this: in the 1980s, the bank was eager to update outmoded practices. They hired a young, energetic CEO, they closed huge swathes of loss-making branches and they ended the practice of hiring people for life. Yet throughout this period, the company posted some of the most spectacular losses in banking history.
			</p>
		</fieldset>

		<form action="" method="POST" class="form1">
			<p><b>Price : LKR4,045.00</b></p>
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
		
		<p class="review"> My advice? Read the book, but skip over its half-hearted claims of rigor and go straight to the sage advice. 
		Jim Collins can’t prove–any more than anyone else–that it’s a bad idea to “make panicky, desperate moves” or “destroy momentum with chronic restructuring,” or “search for a leader-as-savior, with a bias for selecting a visionary from the outside who’ll ride in and galvanize the company” (all behaviors that exemplify Stage 4 of a company’s downfall.) 
		But that doesn’t mean he’s wrong.</p>
		
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