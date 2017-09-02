








    <nav id="menu">
        <li class="menu"><a href="index.php" target="_self">HOME</a></li>
        <li class="menu"><a href="promotions.php" target="_self">MUSIC PROMOTION</a></li>
        <li class="menu"><a href="membership.php" target="_self">MEMBERSHIP</a></li>
        <li class="menu"><a href="adverts.php" target="_self">ADVERT PLACEMENT</a></li>
        <li class="menu"><a href="contact_us.php" target="_self">CONTACT US</a></li>
    </nav>

    <h2>You want to reach us? We are eager to hear from you too</h2>
    <form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="GET" enctype="text/plain">
        Name:<br>
        <input type="text" name="name" placeholder="your name" required="required"><br>
        Phone number:<br>
        <input type="number" name="number" placeholder="your number preceded by country code" required="required"><br>
        E-mail:<br>
        <input type="text" name="mail" placeholder="youremail@website.com" required="required"><br>
        Subject:<br>
        <input type="text" name="subject" placeholder="your name" required="required"><br>
        Your message:<br>
        <textarea name="message" rows="4" cols="50" placeholder="Your message goes here" required="required"></textarea><br>
        <input type="submit" value="SEND MESSAGE" name="submit">
    </form>


    <?php
    if(isset($_GET['submit'])){
        $name=$_GET["name"];
        $number=$_GET["number"];
        $email=$_GET["mail"];
        $subject=$_GET["subject"];
        $message=$_GET["message"];
        $message_target="messages/";
        $message_content = fopen("$subject.txt", "w");
        fwrite($message_content, $name);
        fwrite($message_content, $number);
        fwrite($message_content, $email);
        fwrite($message_content, $subject);
        fwrite($message_content, $message);
        fclose($message_content);
        rename("$subject.txt","$message_target$subject.txt");
        echo '<h4>Thank you for contacting us. We will get back to you if need be</h4>';
    }
    ?>


    <?php
    phpinfo();
    ?>
