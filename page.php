<?php
//var_dump($_POST);
$email = $password = $emailErr = $passErr = $heard = "";
if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $heard = isset($_POST['heard_from']) ? $_POST['heard_from'] : "";

    echo $heard;

    if($email == ""){
        $emailErr = "Please enter email";
    } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $emailErr = "Please enter email in valid format";
    } else {
        $emailErr = "Valid email";
    }

    $pattern = "/[a-zA-Z0-9]{6,14}/";

    if($password == ""){
        $passErr = "Please enter password";
    } elseif (!preg_match($pattern, $password)){
        $passErr = "Please enter password in valid format";
    } else {
        $passErr = "Valid password";
    }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Account Sign Up</h1>
    <form action="" method="post">

    <fieldset>
    <legend>Account Information</legend>
        <label>E-Mail:</label>
        <input type="text" name="email" value="<?= $email; ?>" class="textbox"/>
        <span style="color:red;">
            <?php

                echo $emailErr;



            ?>
        </span>
        <br />

        <label>Password:</label>
        <input type="password" name="password"  class="textbox"/>
        <span style="color:red;">
            <?= $passErr; ?>
        </span>
        <br />

        <label>Phone Number:</label>
        <input type="text" name="phone" value="" class="textbox"/>
    </fieldset>

    <fieldset>
    <legend>Settings</legend>

        <p>How did you hear about us?</p>
        <input type="radio" name="heard_from" value="Search Engine" <?= ($heard == 'Search Engine') ? 'checked' : ''; ?> />
        Search engine<br />
        <input type="radio" name="heard_from" value="Friend" <?= ($heard == 'Friend') ? 'checked' : ''; ?> />
        Word of mouth<br />
        <input type=radio name="heard_from" value="Other" <?= ($heard == 'Other') ? 'checked' : ''; ?> />
        Other<br />

        <p>Would you like to receive announcements about new products
           and special offers?</p>
        <input type="checkbox" name="wants_updates"/>YES, I'd like to receive
        information about new products and special offers.<br />

        <p>Contact via:</p>
        <select name="contact_via">
                <option value="email">Email</option>
                <option value="text">Text Message</option>
                <option value="phone">Phone</option>
        </select>

        <p>Comments:</p>
        <textarea name="comments" rows="4" cols="50"></textarea>
    </fieldset>

    <input type="submit"  name="register" value="Submit" />

    </form>
    <br />
    </div>
</body>
</html>