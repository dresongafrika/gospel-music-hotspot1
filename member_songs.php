<?php require ('top.php') ?>
<section id="main">
    <?php
    if (isset ($_GET['mem_red_name']) && isset($_GET['mem_red_song'])){
        $artiste_name = $_GET['mem_red_name'];
        $song_title = $_GET['mem_red_song'];
        require('db/config.php');
        $query = 'SELECT * FROM members_songs WHERE artiste_name='.$artiste_name.'AND song_title='.$song_title;
        $stmt = mysqli_query ($dbc,$query);
        $row=mysqli_fetch_array($stmt);
        $bio_target='members/'.$artiste_name.'/biographies/';
        $lyric_target='members/'.$artiste_name.'/lyrics/';
        $sNAME=$row["song_title"];
        $aNAME=$row["artiste_name"];
        echo '<h2>'.$row["song_title"]. ' by ' .$row["artiste_name"].'</h2>';
        echo '<h3>BIO</h3>';
        $read_bio = fopen("$bio_target$aNAME.txt", "r");
        echo fread($read_bio,filesize("$bio_target$aNAME.txt"));
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
</section>
<?php require ('bottom.php') ?>