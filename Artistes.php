



<?php


    $query="SELECT * FROM music_promotion WHERE artiste_name LIKE  ";
    require_once ('config.php');
    echo           '<img class="pix" src="'.$row["album_art"].'"alt="'.$row["song_title"].' by '.$row["artiste_name"].'" />';
    echo 			'<audio controls="controls" autoplay="autoplay">
						<source src=".$row["song_link"]." type="audio/mp3"/>
						Your browser does not support the audio element.
					</audio>';


?>
