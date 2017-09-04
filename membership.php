<?php require ('top.php') ?>
<section id="main">
    <h1>What do you stand to gain when you join our artistes community?</h1>
    With a one-time payment of $20 for a year, you have access to:
    <ol>
        <li>A dedicated fan page with your full biography and discography on our website.</li>
        <li>Free song uploads and sharing links (Please note that you set the prices for your tracks and albums and these songs do not appear on our front page except it is promoted by you for a token).</li>
        <li>Your latests hits being played on our 24hour GMH radio and could also be the song of the week if upvoted.</li>
        <li>An e-mail address <em>@gospelmusichotspot.com</em> for easy correspondence with your fans.</li>
        <li>Your social media accounts being linked with your fan page.</li>
        <li>Easy collaboration with artistes you have always wanted to work with.</li>
        <li>A 20% discount on your worship meetings and programmes advertised on our website.</li>
    </ol>

    <p>So what are you waiting for?</p>
    Fill the forms below and get back to us. We are here for you. Bless you.

    <h2>Disclaimer</h2>
    <p>2. The above benefits are subject to constant reviews at the discretion of the admin.</p>
    <p>1. Gospel Music Hotspot does not verify ownership, Please ensure the songs you upload are yours and that they are properly tagged with the appropriate metadata. <br/>
        In cases of dispute over song ownership, court injunctions would be respected and we are not to be held liable for any loss incured neither would there be a refund.</p>
    <h2>Just released a song? This is for you. With just $27.40 you can promote your song on our front page with a download link for your fans</h2>

    <h2>Register now</h2>

    <?php

    // Include config file
    require 'db/config.php';

    // Define variables and initialize with empty values
    $bio=$uName = $fName=$lName=$pWord = $confirm_password = "";
    $fNAME=$_POST["first_name"]="";
    $lNAME=$_POST["last_name"]="";
    $phone=$_POST["phone"]="";
    $email=$_POST["email"]="";
    $add=$_POST["address"]="";
    $fb=$_POST["facebook"]="";
    $twitter=$_POST["twitter"]="";
    $bio_err=$username_err = $password_err = $confirm_password_err = $fname_err=$lname_err=$phone_err=$email_err=$address_err=$fb_err=$twitter_err="";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate user_name
        if(empty(trim($_POST["user_name"]))){
            $username_err = "Please enter a user_name.";
        } else{
            // Prepare a select statement
            $sql = "SELECT artiste_id FROM members WHERE artiste_name = ?";

            if($stmt = mysqli_prepare($dbc, $sql)){
                // Set parameters
                $param_username = trim($_POST["user_name"]);

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This user_name is already taken.";
                    } else{
                        $uName = trim($_POST["user_name"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate password
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter a password.";
        } elseif(strlen(trim($_POST['password'])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $pWord = trim($_POST['password']);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Please confirm password.';
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($pWord != $confirm_password){
                $confirm_password_err = 'Password did not match.';
            }
        }

        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO members (artiste_name, password) VALUES (?, ?)";

            if($stmt = mysqli_prepare($dbc, $sql)){

                // Set parameters
                $param_username = $uName;
                $param_password = password_hash($pWord, PASSWORD_DEFAULT); // Creates a password hash

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                $cwd=getcwd();
                $structure1=$cwd."/members/".$param_username;
                $structure2=$structure1."/uploads";
                $structure3=$structure1."/lyrics";
                $structure4=$structure1."/album art";
                $structure5=$structure1."/fan messages";
                mkdir($structure1,0777,true);
                mkdir($structure2,0777,true);
                mkdir($structure3,0777,true);
                mkdir($structure4,0777,true);
                mkdir($structure5,0777,true);

                $bio_title=$structure1."/".$param_username;
                $bio=trim($_POST['bio']);
                $bio_open=fopen("$bio_title.txt","w");
                fwrite($bio_open, $bio);
                fclose($bio_open);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: member_login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($dbc);
    }
    ?>

    <form method="POST" action="https://voguepay.com/pay/">
        <input type="hidden" name="v_merchant_id" value="3828-0054426" />
        <input type="hidden" name="memo" value="payment for promotional song upload" />
        <input type="hidden" name="success_url" value="https://localhost/gospel-music-hotspot/promotions.php?pay=yes" />
        <input type="hidden" name="fail_url" value="https://localhost/gospel-music-hotspot/promotions.php?pay=no" />
        <input type="hidden" name="cur" value="NGN" />
        <input type="hidden" name="item_1" value="upload" />
        <input type="hidden" name="developer_code" value="599a05bc1e8d3" />
        <input type='hidden' name='total' value='10000' />
        <input type="hidden" name="description_1" value="" /><br />
        <input type="image" src="https://voguepay.com/images/buttons/make_payment_blue.png" alt="PAY WITH YOUR CREDIT/DEBIT CARD" />
    </form>
    <i class="fa fa-cc-discover" ></i><i class="fa fa-cc-visa"></i><i class="fa fa-cc-mastercard"></i><i class="fa fa-cc-paypal"></i></br>

    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                <label>First name:<sup>*</sup></label>
                <input type="text" name="first_name" class="form-control" value="<?php echo $fName; ?>">
                <span class="help-block"><?php echo $fname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                <label>Last Name:<sup>*</sup></label>
                <input type="text" name="last_name" class="form-control" value"<?php echo $lName; ?>">
                <span class="help-block"><?php echo $lname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                <label>Tell us about yourself:<sup>*</sup></label>
                <textarea class="form-control" name="bio" rows="4" cols="50" placeholder="Type it this way starting with your name.
                Damilare Ademeso is minister of the gospel devoted to seeing the flames of worship across the nations e.t.c " value"<?php echo $bio; ?>"></textarea></br>
                <span class="help-block"><?php echo $bio_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Phone number:<sup>*</sup></label>
                <input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email:<sup>*</sup></label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Physical Address:<sup>*</sup></label>
                <input type="text" name="address" class="form-control" value="<?php echo $add; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($fb_err)) ? 'has-error' : ''; ?>">
                <label>Facebook Url:<sup>*</sup></label>
                <input type="url" name="facebook" class="form-control" value="<?php echo $fb; ?>">
                <span class="help-block"><?php echo $fb_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($twitter_err)) ? 'has-error' : ''; ?>">
                <label>Twitter url:<sup>*</sup></label>
                <input type="url" name="twitter"class="form-control" value="<?php echo $twitter; ?>">
                <span class="help-block"><?php echo $twitter_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Stage_name:<sup>*</sup></label>
                <input type="text" name="user_name"class="form-control" value="<?php echo $uName; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $pWord; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <?php
            /** if (isset($_GET['pay'])){
            if ($_GET['pay']='yes'){    **/
            echo '<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>';
            /**   }else{
            echo 'please pay to proceed';
            }
            }  **/
            ?>
            <p>Already have an account? <a href="member_login.php">Login here</a>.</p>
        </form>
    </div>
</section>
<?php require ('bottom.php') ?>
