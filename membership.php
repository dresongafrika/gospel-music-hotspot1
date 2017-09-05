<?php require ('top.php');
$uName =$pWord = $confirm_password = "";
$username_err = $password_err = $confirm_password_err ="";
echo'
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
        <h2>Register now</h2>
        <form enctype="multipart/form-data" action="'. htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
            <div class="form-group">
                <label>Stage_name:<sup>*</sup></label>
                <input type="text" name="user_name" class="form-control" value="';echo $uName; echo'">
                <span class="help-block">'; echo $username_err; echo'</span>
            </div>
            <div class="form-group">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="' ;echo $pWord; echo '">
                <span class="help-block">';echo $password_err;echo'</span>
            </div>
            <div class="form-group">
                <label>Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="';echo $confirm_password; echo '">
                <span class="help-block">';echo $confirm_password_err; echo '</span>
            </div>
        </form>';
            // Define variables and initialize with empty values
           $uName =$pWord = $confirm_password = "";
           $username_err = $password_err = $confirm_password_err ="";
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
                        }else{
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
            }
        ?>
        <form method="POST" action="https://voguepay.com/pay/">
            <input type="hidden" name="v_merchant_id" value="3828-0054426" />
            <input type="hidden" name="memo" value="payment for promotional song upload" />
            <input type="hidden" name="success_url" value="<?php echo getcwd();?>/membership.php?pay=yes" />
            <input type="hidden" name="fail_url" value="<?php echo getcwd();?>/membership.php?pay=no" />
            <input type="hidden" name="cur" value="NGN" />
            <input type="hidden" name="item_1" value="upload" />
            <input type="hidden" name="developer_code" value="599a05bc1e8d3" />
            <input type='hidden' name='total' value='10000' />
            <input type="hidden" name="description_1" value="" /><br />
            <input type="image" src="https://voguepay.com/images/buttons/make_payment_blue.png" alt="PAY WITH YOUR CREDIT/DEBIT CARD" />
        </form>
        <i class="fa fa-cc-discover" ></i><i class="fa fa-cc-visa"></i><i class="fa fa-cc-mastercard"></i><i class="fa fa-cc-paypal"></i></br>
        <?php
             if (isset($_GET['pay'])){
                if ($_GET['pay']='yes'){
                // Check input errors before inserting in database
                if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

                    // Prepare an insert statement
                    $sql = "INSERT (artiste_id,artiste_name,password,mrmbership_date,expiry_date)INTO members VALUES (NULL,?,?,NOW(),NOW())";

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
                            echo 'Welcome'.$param_username.'!';
                    // Redirect to login page
                            echo '<a href="member_edit.php?name='.$param_username.'><h6>welcome,'.$param_username.'! Click here to set up your profile</h6></a>';
                        } else{
                            echo "Something went wrong. Please try again later.";
                        }
                    }
                }

            }else{
            echo 'please pay to continue';
            }
          }
        ?>
    <p>Already have an account? <a href="member_login.php">Login here</a>.</p>
</section>
<?php require ('bottom.php') ?>
