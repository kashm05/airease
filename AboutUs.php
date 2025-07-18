<?php
    session_start();
    if(!isset($_SESSION['log']))
    {
      header('Location: index.html');
    }
    if (isset($_SESSION['u']))
    {
        $username=$_SESSION['u'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>About Us</title>
	<link rel="icon" type="image/png" href="assets/tablogo.png">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/44f557ccce.js"></script>

	<style>
		@import url("https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap");

    :root {
        --primary-color: #8E2157;
        --primary-color-dark: #6b0f3d;
        --text-dark: #0b0f18;
        --text-light: #503744;
        --extra-light: #f1f5f9;
        --white: #ffffff;
        --max-width: 1400px;
    }
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}
		body {
            background-color: #f1f5f9;
        }
		/*-----------------HEADER------------------------*/
		header {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			display: flex;
			justify-content: space-between;
			align-items: center;
			transition: 0.6s;
			padding: 10px 20px 0 30px;
			z-index: 10000;
			background-color: var(--white);
		}

		header .logo {
			font-weight: 700;
			color: white;
			text-decoration: none;
			font-size: 1.5rem;
			text-transform: uppercase;
			letter-spacing: 2px;
			transition: 0.6s;
		}

		header ul {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		header ul li {
			margin-right: 15px;
			list-style: none;
		}

		header ul li:last-child {
			margin-right: 0;
		}

		header ul li a {
			margin: 0 15px;
			text-decoration: none;
			color: var(--primary-color);
			letter-spacing: 2px;
			font-weight: 700;
			transition: 0.6s;
			background: #fff;
		}

		.nav__logo img {
			height: 50px;
			width: 150px;
			margin-right: 10px;
		}

		.nav__links {
			list-style: none;
			display: flex;
			align-items: center;
			gap: 2rem;
		}

		.nav__links li {
			list-style: none;
			display: inline-block;
			padding: 8px 12px;
			position: relative;
			font-family: 'Poppins', sans-serif;
		}

		.nav__links li a {
			color: var(--text-dark);
			text-decoration: none;
			font-weight: 700;
			font-family: 'Poppins', sans-serif;
		}

		.nav__links li::after {
			content: '';
			width: 0%;
			height: 3px;
			background: var(--primary-color);
			display: block;
			margin: auto;
			transition: 0.5s;
		}

		.nav__links li:hover::after {
			width: 80%;
		}

		.login {
			display: flex;
			align-items: center;
		}

		.login i {
			position: relative;
			right: 40px;
			top: 0px;
		}

		.login div {
			position: relative;
			right: 35px;
		}

		.user-log {
			position: relative;
			margin-top: -12px;

			color: var(--primary-color);
			text-decoration: none;
		}

		.user-log::after,
		.user-log:hover {
			text-decoration: none;
			color: var(--primary-color);
			cursor: pointer;
		}

		.btn {
			padding: 0.75rem 2rem;
			outline: none;
			border: none;
			font-size: 1rem;
			font-weight: 500;
			color: var(--white);
			background-color: var(--primary-color);
			border-radius: 2rem;
			cursor: pointer;
			margin-top: -10px;
			transition: 0.3s;
		}

		.btn a {
			color: var(--extra-light);
			text-decoration: none;
		}

		.btn:hover {
			background-color: var(--primary-color-dark);
		}

		/*--------------------FOOTER CSS------------------*/
		.footer {
			position: relative;
			bottom: -20px;
			width: 100%;
			background-color: var(--primary-color);
			padding: 20px 0;
			margin-top: 10px;
		}

		.footer__bar1 {
			padding: 0 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 1rem;
		}

		.footer__bar1 p {
			font-size: 0.9rem;
			color: white;
			padding: 0 80px;
		}

		.footer__container {
			display: grid;
			grid-template-columns: 2fr repeat(2, 1fr);
			gap: 5rem;
			padding: 18px 8px;
		}

		.social {
			display: flex;
			align-items: center;
			gap: 1rem;
		}

		.social span {
			font-size: 1.2rem;
			color: var(--extra-light);
		}

		.social span a {
			text-decoration: none;
			color: var(--extra-light)
		}

		.n_logo {
			display: flex;
			font-size: 1.5rem;
			font-weight: 600;
			color: var(--text-dark);
		}

		.n_logo img {
			height: 40px;
			width: 120px;
			margin-right: 10px;
		}

		/* -------------ABOut CSS--------------------- */
		#main-box1 {
			background-color: white;
			text-align: center;
			border-radius: 8px;
			font-size: 50px;
			box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
		}

		#main-box {
			width: 96%;
			position: relative;
			top: 10px;
			left: 36px;
			background-color: white;
			text-align: center;
			padding: 20px 20px 20px 20px;
			border-radius: 20px;
			box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
		}

		.text-info {
			width: 62%;
			background-color: #f1f5f9;
			color: black;
			border-radius: 10px;
		}
		.img-info {border-radius: 10px;}
		p {font-size: 20px;}
		h2 {padding-top: 10px;}
		.boxs {
			display: flex;
			justify-content: space-between;
		}
        .img-info:hover{
            transform: scale(1.07);
            transition: 0.5s;
        }
        .text-info:hover{
            transform: scale(1.03);
            transition: 0.5s;
        }
	</style>
</head>

<body>
	<header>
		<div class="nav__logo"><img src="assets/aireaselogo.png"></div>
		<ul class="nav__links">
			<li class="link"><a href="homepagewl.php">HOME</a></li>
			<li class="link"><a href="MyFlights.php">MY FLIGHTS</a></li>
			<li class="link"><a href="AboutUs.php">ABOUT</a></li>
			<li class="link"><a href="feedback.php">FEEDBACK</a></li>
		</ul>
		<a class="user-log"><i class="fa fa-user" style="font-size:24px"></i> <?php echo$username;?></a>
		<a href="new-home updates.html"><button class="btn">Logout &nbsp;<i class="fa fa-sign-out"
					style="font-size:15px"></i></button></a>
	</header><br><br><br>
	<section class="aboutus">
	
		<div id="main-box">
			<h3 style="color: #8E2157;">Welcome to AirEase , your trusted partner in simplifying air travel.
				<br>At JETSETFLY, we are dedicated to providing you with a seamless and efficient booking experience,
				ensuring that your journey <br>starts off on the right foot.
			</h3>
			<br>
			<div class="boxs" id="first-box">
				<div class="text-info">
					<div>
						<h2>Our Mission</h2>
					</div>
					<br>
					<div>
						<p> Our mission is to revolutionize the way you book flights, making it easier, faster,<br> and
							more convenient than ever before. We strive to empower<br> travelers by offering a
							user-friendly
							platform
							that enables hassle-free booking,<br> comprehensive flight information, and exceptional
							customer
							service.</p>
					</div>
				</div>
				<div><img src="assets/first.jpg" class="img-info" alt="wait for some time" width="500" height="250"></div>
			</div>
			<br>
			<div class="boxs" id="second-box">
				<div><img src="assets/second.jpg" class="img-info" alt="wait for some time" width="500" height="250"></div>
				<div class="text-info">
					<div>
						<h2>Who We Are</h2>
					</div>
					<br>
					<div>
						<p>AirEase is a leading provider of online flight booking services,
							catering to travelers from all walks of life. Our team comprises dedicated professionals
							<br>with extensive
							experience in the travel industry, committed to delivering <br>excellence in every aspect of our
							service.</p>
					</div>
				</div>
			</div>
			<br>
			<div class="boxs" id="Third-box">
				<div class="text-info">
					<div>
						<h2>Our Commitment to You</h2>
					</div>
					<br>
					<div>
						<p>At AirEase, we are committed to excellence in every aspect of our service.
							<br> Whether you're planning a business trip, a family vacation, or <br>a spontaneous getaway,
							we're here to make your travel dreams a reality.<br> Trust us to be your companion in the
							skies,
							and let us take you to your next destination with ease and comfort.
						</p>
					</div>
				</div>
				<div><img src="assets/third.jpg" class="img-info" alt="wait for some time" width="500" height="250"></div>
			</div>
		</div>
	</section>
	<footer class="footer">
		<div class="section__container footer__bar1">
			<p>Copyright © 2025 Team GLSE01. All rights reserved.</p>
			<div class="social">
				<span><a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill"></i></a></span>
				<span><a href="" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a></span>
				<span><a href="" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a></span>
				<span><a href="" class="text-muted" target="_blank"><i class="ri-youtube-fill"></i></a></span>
				<div class="n_logo"><img src="assets/aireaselogoinwhite.jpg">
				</div>
			</div>
	</footer>
</body>

</html>