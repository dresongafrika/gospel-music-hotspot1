

<h4>MESSAGES!</h4>
<?php
require ('db/config.php');
$query = "SELECT message_link FROM contact_us ORDER BY message_date ASC" ;
$stmt = mysqli_query ($dbc,$query);
while ($row=mysqli_fetch_array($stmt)) {
    echo '<div class="contact_us">';
    $read_message=fopen($row["message_link"],"r");
    echo fread($read_message,filesize($row["message_link"]));
    fclose($read_message);
    echo '</div>';
}
?>
