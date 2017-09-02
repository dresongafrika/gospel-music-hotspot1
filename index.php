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
                <li class="menu"><a href="promotions.php" target="_self">MUSIC PROMOTION</a></li>
				<li class="menu"><a href="membership.php" target="_self">MEMBERSHIP</a></li>
				<li class="menu"><a href="adverts.php" target="_self">ADVERT PLACEMENT</a></li>
				<li class="menu"><a href="contact_us.php" target="_self">CONTACT US</a></li>
			</nav>
                <div>
                    Click play to listen to 24hr Gospel Music Hotspot!
                    <audio controls="controls">
                                <?php
                                require_once ('config.php');
                                $query = "SELECT * FROM music_promotion";
                                $stmt = mysqli_query ($dbc,$query);
                                while ($row=mysqli_fetch_array($stmt)){
                                    echo '<source src=" '. $row["song_link"] .' " type="audio/mp3">
                                    Your browser does not support the audio element.';
                                }
                                mysqli_close($dbc);
                                ?>
                    </audio>
                </div>
                <div id="navigation">
				<div id="nav_container" onmouseover="mOver(this)" onmouseout="mOut(this)">
					<nav id="navigator" ><i class="fa fa-navicon"/></i></nav>
					<nav id="menu_new_nav">
						<li class="new_nav"><a href="index.php" target="_self">HOME</a></li>
						<li class="new_nav"><a href="promotions.php" target="_self">MUSIC PROMOTION</a></li>
						<li class="new_nav"><a href="membership.php" target="_self">MEMBERSHIP</a></li>
						<li class="new_nav"><a href="adverts.php" target="_self">ADVERT PLACEMENT</a></li>
						<li class="new_nav"><a href="contact_us.php" target="_self">CONTACT US</a></li>
					</nav>
				</div>
				<section id="ipolowo">
             <?php  require ('config.php');
                    $query = "SELECT * FROM advertisement";
                    $stmt = mysqli_query ($dbc,$query);
                    while ($row=mysqli_fetch_array($stmt)){
                        echo  '<a href="'.$row["prog_url"].'" target="_blank"><img class="arowoyin" src="'.$row["banner_link"].'" alt="'.$row["program_name"].'" /></a>';
                    }
                    mysqli_close($dbc);
                    ?>
					<a href="adverts.php" target="_blank"><img class="arowoyin" src="Images/advertise with us.png" alt="advertise with us" /></a>
				</section>
			</div>
			<main>
				<section id="new_songs"style="background-image: url(Images/solid.png);">
					<h4>NEW RELEASE!(Scroll down for more downloads)</h4>

                    <?php require ('config.php');
                    $query = "SELECT * FROM music_promotion ORDER BY artiste_id DESC ";
                    $stmt = mysqli_query ($dbc,$query);
                    while ($row=mysqli_fetch_array($stmt)){
                    echo	'<div class="album_art" >
                             <figure class=" album">
                                <img class="pix" src="'.$row["album_art"].'" alt="'.$row["song_title"].' by '.$row["artiste_name"].'" />
                                <figcaption>'.$row["song_title"].' by '.$row["artiste_name"].'.</figcaption>
                             </figure class=" album">
                             <a href="promo_uploads.php?redirect='.$row["artiste_name"].'" target="_blank" id="download">Download/Play online</a>
                             </div>';
                    }
                    mysqli_close($dbc);
                    ?>
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