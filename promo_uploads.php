

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
    <main>
        <section id="new_songs"style="background-image: url(Images/solid.png);">
            <?php
            if (isset ($_GET['redirect'])){
                $redirect = $_GET['redirect'];
                require_once('config.php');
                $query = "SELECT * FROM music_promotion WHERE artiste_name='".$redirect."'";
                $stmt = mysqli_query ($dbc,$query);
                $row=mysqli_fetch_array($stmt);
                echo $row["song_title"]. ' by ' .$row["artiste_name"];
                echo '<img class="promo_cover" src="' . $row["album_art"] . '"alt="' . $row["song_title"] . ' by ' . $row["artiste_name"] . '" />';
                echo '<audio controls="controls" autoplay="autoplay">
                            <source src="' . $row["song_link"] . '" type="audio/mp3"/>
                            Your browser does not support the audio element.
                        </audio></br>';
                $lyric_target="lyrics/";
                $sNAME=$row["song_title"];
                $aNAME=$row["artiste_name"];
                echo '<b>Lyrics</b></br>';
                $read_lyrics = fopen("$lyric_target$sNAME by $aNAME.txt", "r");
                echo fread($read_lyrics,filesize("$lyric_target$sNAME by $aNAME.txt"));
                fclose($read_lyrics);
                mysqli_close($dbc);
            }
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
