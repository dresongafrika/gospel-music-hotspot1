<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Gospel Music Hotspot</title>
			<!--[if lt IE 9]>
			<script src="js/html5shiv.js">
			</script>
			<![endif]-->
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="shortcut icon" type="image/png" href="icons/gospel music hotspot icon.png"/>
		<link rel="stylesheet" href="css/gmh.css" />
		<link rel="shortcut icon" type="image/png" href="icons/gmhotspot web LOGO.png"/>
		</head>
	<body >
		<div id="body_wrapper">
			<header id="header">
				<a href="index.php"><img id="logo" src="icons/gmhotspot web LOGO.png" alt="logo"/></a>
				<a href="index.php"><img id="banner" src="icons/gmhotspot web banner.png" alt="logo"/></a>
				<!--this is the menu page-->
			</header>
			<nav id="menu">
				<li class="menu"><a href="index.php" target="_self">HOME</a></li>
				<li class="menu"><a href="artistes.php" target="_self">ARTISTES</a></li>
				<li class="menu"><a href="promotions.php" target="_self">MUSIC PROMOTION</a></li>
				<li class="menu"><a href="membership.php" target="_self">MEMBERSHIP</a></li>
				<li class="menu"><a href="adverts.php" target="_self">ADVERT PLACEMENT</a></li>
				<li class="menu"><a href="contact_us.php" target="_self">CONTACT US</a></li>
			</nav>
		<!--	<div id="song_downloads">
					<h5 id="artiste_choice">Download mp3:</h5>
					<select id="select" name="Artistes">
						<option value="mike_abdul.php">Mike Abdul</option>
						<option> Glowreeyah Braimah</option>
						<option> Nathaniel Bassey</option>
						<option> Dresong</option>
						<option> Midnight Crew</option>
						<option> Elijah Oyelade</option>
						<option> Mc'Abuluya Agbutun</option>
					</select>
				</div>
					<div id="radio">
					<h5 id="listen">Listen to 24hr GMH radio!</h5>
					<audio controls="controls" autoplay="autoplay">
						<source src="horse.ogg" type="audio/ogg"/>
						<source src="horse.mp3" type="audio/mpeg"/>
						Your browser does not support the audio element.
					</audio> 
				</div> -->
			<!--this is the song of the week columnand comments section to be scrolled up and down through flash player-->
			<div id="navigation">
				<div id="nav_container" onmouseover="mOver(this)" onmouseout="mOut(this)">
					<nav id="navigator" ><i class="fa fa-navicon"/></i></nav>
					<nav id="menu_new_nav">
						<li class="new_nav"><a href="index.php" target="_self">HOME</a></li>
						<li class="new_nav"><a href="artistes.php" target="_self">ARTISTES</a></li>
						<li class="new_nav"><a href="promotions.php" target="_self">MUSIC PROMOTION</a></li>
						<li class="new_nav"><a href="membership.php" target="_self">MEMBERSHIP</a></li>
						<li class="new_nav"><a href="adverts.php" target="_self">ADVERT PLACEMENT</a></li>
						<li class="new_nav"><a href="contact_us.php" target="_self">CONTACT US</a></li>
					</nav>
				</div>
				<section id="ipolowo"> 
					<img class="arowoyin" src="Arowoyin/Jellyfish.jpg" alt="ipolowo" />
					<img class="arowoyin" src="Arowoyin/Desert.jpg" alt="ipolowo" />
					<img class="arowoyin" src="Images/ekele.jpg" alt="ipolowo" />
					<img class="arowoyin" src="Images/monique.png" alt="ipolowo" />
					<img class="arowoyin" src="Images/tye.jpg" alt="ipolowo" />
				</section>
			</div>
			<main>
				<section id="new_songs"style="background-image: url(Images/solid.png);">
					<h2>Fill form below to contact us</h2>
					<form action="MAILTO:ademesodamilare@gmail.com" method="post" enctype="text/plain">
						Name:<br>
						<input type="text" name="name" placeholder="your name"><br>
						E-mail:<br>
						<input type="text" name="mail" placeholder="your email"><br>
						Comment:<br>
						<input type="text" name="comment" placeholder="your comment" size="50"><br><br>
						<input type="submit" value="Send">
						<input type="reset" value="Reset">
					</form>
				</section>
				<section id="song_ipolowo" style="background-image: url(Images/solid.png);">
					<img class="arowo_google" src="Images/monique.png" alt="Monique Power" />
					<article>
						<blink><h4>Song of the week!(Scroll down to download)</h4></blink>
						<h3 id="song_title">Steps by Dresong</h3>
					
						<p>My steps are ordered by the Lord and I will never be ashamed,<br />
							He leads me every where I go and I will never be afraid.
						</p>
						<p>Everywhere I go, anywhere I stand<br />
						Everywhere I go, anywhere I stand,<br />
						I see Jesus, everywhere I go,<br />
						I see Jesus, everywhereI go.
						</p>
						<p>My steps are ordered by the Lord and I will never be ashamed,<br />
							He leads me every where I go and I will never be afraid.
						</p>
						<input type="submit" value="Download" /><input type="submit" value="Play"/><input type="submit" value="Share"/>
					</article>
					<img class="arowo_google" src="Images/monique.png" alt="Monique Power"/>
				</section>
			</main>
			<footer id="footer">
				<ul id="social_icons">
					<li class="social"> <a href=""><i class="fa fa-facebook"></i> </li></a>
					<li class="social"> <a href=""><i class="fa fa-twitter"></i> </li></a>
					<li class="social"> <a href=""><i class="fa fa-instagram"></i> </li></a>
					<li class="social"> <a href=""><i class="fa fa-google-plus-square"></i> </li></a>
					<li class="social"> <a href=""><i class="fa fa-whatsapp"></i> </li></a>
				</ul>
				<p id="copyright">&copy 2017 Website designed @ Africa Developers Hub (+2348182818327,+2348136776626)</p>
			</footer>
		</div>
<script type="text/javascript" src="js/gmh.js"></script>
	</body>
</html>