<!DOCTYPE HTML>
<!--
	Big Picture by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="ru">
	<head>
		<title>Маникюр Шостка</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
		<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h2><a href="#intro">Виктория</a></h2>
				<nav>
					<ul>
						<li><a class="nav-link" href="#intro">Intro</a></li>
						<li><a class="nav-link" href="#one">Обо мне</a></li>
						<li><a class="nav-link" href="#two">Что я делаю</a></li>
						<li><a class="nav-link" href="#work">Мои работы</a></li>
						<li><a class="nav-link" href="#contact">Контакты</a></li>
                        <li><a class="nav-link" href="/php/entrance.php">Для админа</a></li>
                    </ul>
				</nav>
			</header>

		<!-- Intro -->
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content">
					<header>
						<h1 class="intro-title">Маникюр, наращивание, коррекция, покрытие гель лаком в Шостке.</h1>
					</header>
					<!-- <p>Welcome to <strong>Big Picture</strong> a responsive site template designed by <a href="https://html5up.net">HTML5 UP</a><br />
					and released for free under the <a href="https://html5up.net/license">Creative Commons Attribution license</a>.</p> -->
					<footer>
						<a href="#one" class="button style2 down">More</a>
					</footer>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Обо мне</h2>
					</header>
					<p>Здравствуйте. Меня зовут Виктория. Я начинающий мастер маникюра.</p>
				</div>
				<a href="#two" class="button style2 down anchored">Next</a>
			</section>

		<!-- Two -->
			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Что я делаю</h2>
					</header>
					<p>Комбинированный и аппаратный маникюр, выравнивание натуральных ногтей базой и покрытие гель лаком, укрепление натуральных ногтей, наращивание и коррекция.  </p>
				</div>
				<a href="#work" class="button style2 down anchored">Next</a>
			</section>

		<!-- Work -->
			<section id="work" class="main style3 primary">
				<div class="content">
					<header>
						<h2 class="wow lightSpeedIn" data-wow-delay="0.7s">Мои работы</h2>
					</header>

					<!-- Gallery  -->
					<div class="fotorama wow fadeInLeftBig" data-wow-delay="0.8s" data-width="100%"
    						 data-ratio="800/600" data-maxwidth="1000" data-maxheight="100%" data-click="true" data-trackpad="true" data-swipe="true" data-allowfullscreen="true" data-loop="true">
                        <?php
                            $dir = "images/works";
                            if (is_dir($dir)) {
                                $openDir = opendir($dir);
                                while (($file = readdir($openDir)) !== false) {
                                    if($file != "." && $file != "..") {
                                        echo "<img src='images/works/$file' alt=\"\">";
                                    }
                                }
                                closedir($openDir);
                            }
                            ?>

						</div>
						<!---/- fotorama --->

					<a href="#pictures" class="button style2 down anchored">Next</a>
				</div>
			</section>
			<!--/- Work -->

		<!-- Contact -->
			<section id="contact" class="main style3 secondary">
				<div class="content">
					<header>
						<h2 class="wow fadeInDownBig" data-wow-delay="0.5s">Контакты</h2>

					</header>
					<div class="contact-phone">
						<div class="social wow fadeInLeftBig" data-wow-delay="0.3s"><a href="https://www.facebook.com/vikanail86" target="_blank" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a>
						</div>
						<div class="social wow flip" data-wow-delay="0.4s"><a href="https://www.instagram.com/vikulichka2019/" target="_blank" class="icon brands fa-instagram" data-wow-delay="0.8s"><span class="label">Instagram</span></a>
						</div>
						<div class="social wow fadeInRightBig" data-wow-delay="0.7s"><a href="https://www.facebook.com/messages" target="_blank" class="icon brands fa-facebook-messenger"><span class="label">facebook-messenger</span></a></div>
					</div>

					<div class="contact-phone"><i class="fas fa-phone-square-alt phone__icone wow fadeInLeft" data-wow-delay="0.5s"></i><div class="phone__number wow fadeInRightBig" data-wow-delay="0.2s">066 919 37 27</div></div>

					<div class="contact-phone"><i class="fas fa-phone-square-alt phone__icone wow fadeInRightBig" data-wow-delay="0.3s"></i><div class="phone__number wow fadeInLeftBig">098 231 94 81</div></div>

					<div class="contact-phone"><i class="fas fa-envelope-open-text phone__icone wow fadeInDownBig" data-wow-delay="0.3s"></i><div class="phone__number wow fadeInUpBig" data-wow-delay="0.4s"><a class="email" href="mailto:victoria@manicure-shostka.pp.ua">victoria@manicure-shostka.pp.ua</a></div></div>
					<!-- <div class="box">
						<form method="post" action="#">
							<div class="fields">
								<div class="field half"><input type="text" name="name" placeholder="Name" /></div>
								<div class="field half"><input type="email" name="email" placeholder="Email" /></div>
								<div class="field"><textarea name="message" placeholder="Message" rows="6"></textarea></div>
							</div>
							<ul class="actions special">
								<li><input type="submit" value="Send Message" /></li>
							</ul>
						</form>
					</div> -->
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">

					<div class="footer-menu">
						<span class="wow zoomIn" data-wow-delay="0.5s">&copy; Untitled Design:Oleg S and HTML5 UP</span>
<!--						<span class="adminka"><a href="/php/admin.php">for admin</a></span>-->
					</div>

			</footer>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

			<!-- <script src="assets/js/slick.min.js"></script> -->
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/wow.min.js"></script>
			<script>
				new WOW().init();
			</script>
			<script type="text/javascript" src="https://spikmi.com/Widget?Id=1414"></script>
	</body>
</html>