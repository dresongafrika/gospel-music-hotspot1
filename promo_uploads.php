

    <nav id="menu">
        <li class="menu"><a href="index.php" target="_self">HOME</a></li>
        <li class="menu"><a href="promotions.php" target="_self">MUSIC PROMOTION</a></li>
        <li class="menu"><a href="membership.php" target="_self">MEMBERSHIP</a></li>
        <li class="menu"><a href="adverts.php" target="_self">ADVERT PLACEMENT</a></li>
        <li class="menu"><a href="contact_us.php" target="_self">CONTACT US</a></li>
    </nav>
            <?php
            if (isset ($_GET['redirect'])){
                $redirect = $_GET['redirect'];
                require_once('config.php');
                $query = "SELECT * FROM music_promotion WHERE artiste_name='".$redirect."'";
                $stmt = mysqli_query ($dbc,$query);
                $row=mysqli_fetch_array($stmt);
                $bio_target="biographies/";
                $lyric_target="lyrics/";
                $sNAME=$row["song_title"];
                $aNAME=$row["artiste_name"];
                echo '<h2>'.$row["song_title"]. ' by ' .$row["artiste_name"].'</h2>';
                echo '<h3>BIO</h3>';
                $read_bio = fopen("$bio_target$aNAME.txt", "r");
                echo fread($read_bio,filesize("$bio_target$aNAME.txt\""));
                fclose($read_bio);
                echo '<img class="promo_cover" src="' . $row["album_art"] . '"alt="' . $row["song_title"] . ' by ' . $row["artiste_name"] . '" />';
                echo '<audio controls="controls" autoplay="autoplay">
                            <source src="' . $row["song_link"] . '" type="audio/mp3"/>
                            Your browser does not support the audio element.
                        </audio></br>';
                echo '<h3>Lyrics</h3></br>';
                $read_lyrics = fopen("$lyric_target$sNAME by $aNAME.txt", "r");
                echo fread($read_lyrics,filesize("$lyric_target$sNAME by $aNAME.txt"));
                fclose($read_lyrics);
                mysqli_close($dbc);
            }
            ?>
