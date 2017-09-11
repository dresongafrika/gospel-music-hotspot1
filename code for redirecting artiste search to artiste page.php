<?php
if(isset($_POST["submit"])){
    header('location: member_page.php?name='.$_POST["artiste_name"]);
}


/** upper code is for redirecting userss who clicked artiste name to artiste page */


/** content to be replaced for membership payment later on lines 117 and 118 and remove submit button from form**/
if (isset($_GET['pay'])) {
    if ($_GET['pay'] = 'yes') {
    }
}



/** change submit input for payment gateway back to image  and src="https://voguepay.com/images/buttons/make_payment_blue.png"**/




/**remember to add show pay function later to the membership page **/




echo'
    <form enctype="multipart/form-data" action="'. htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
    <div class="form-group">
        <label>Stage_name:<sup>*</sup></label>
        <input type="text" name="user_name" class="form-control" value="'. $uName .'">
        <span class="help-block">'. $username_err .'</span>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Submit" onclick="showpay()">
    </div>
    
    </form>';







/** for member_create.php */

/** payment_gateway */



/** conditions for member_create */
while ($row=mysqli_fetch_array($stmt)){
    if(!isset($_GET['pay']) || empty($_GET['username']) ||$_GET['username']==!$row['artiste_name'] || empty($row['password'])){
        session_start();
        header("location: membership.php");
        exit;
    }
}


/** facebook share for keeps */
?>

