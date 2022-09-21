<?php  
require "config.php";
$cart_count =  0 ; 
if(isset($_SESSION['Cart'])){
	foreach($_SESSION['Cart'] as $v){
		$cart_count++;
	}
}
?>

<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop fix-menu-desktop" >
			<!-- Topbar -->

			<div class="wrap-menu-desktop" style="  top: 0px;">
				<nav class="limiter-menu-desktop container ">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo" style="height : 150px;">
						<img src="images/logo.png" height="120px" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>
							
							<li>
								<a href="product.php">Shop</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
	
							</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
				
					<?php
if(isset($_SESSION['loggeduser'])){
	$user_id=$_SESSION['loggeduser'];
	$viewuser="SELECT * FROM user WHERE user_id ='$user_id' ";
	$result=$pdo->query($viewuser);
	$row=$result->fetch(PDO::FETCH_ASSOC);
	
echo '<a href="profile.php?logout=true">	
								<i class="zmdi zmdi-power" style="font-size: 13pt;
								color: #666666;"> Log out</i>
							</a>	
							<a href="profile.php" class="dis-block icon-header-item  hov-cl1 trans-04 p-l-22 p-r-11 " style="font-size: 14pt;">
							<i class="zmdi zmdi-account-circle" style=" color:black"> '.$row['username'].'</i>
						</a>	
						
							
						
							
						
	';
}
else{
	echo '
	<a href="login.php">	
	<i class="zmdi zmdi-account-o" style="font-size: 15pt; color: black; "> Log In</i>
	</a>


	
';	
}
?>	<div class="icon-header-item  hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $cart_count ; ?>">
							<i class="zmdi zmdi-shopping-cart" style="color:#ce4c4c;"></i>
						</div>
					
						
						
						
					
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile" style="height : 60px;">
				<a href="index.php"><img src="images/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item  hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item  hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $cart_count; ?>" >
					<i class="zmdi zmdi-shopping-cart" ></i>
				</div>

				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="product.php">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.php" >Shopping cart</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
				</li>

			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
