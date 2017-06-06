<?php
$blog = new \Library\CMS\CMS();
$submit = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = "";

if (isset($submit) && $submit === 'login') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //echo $username . " " . $password . "<br>\n";
    $result = $blog->login($username, $password);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invald Login Attempt, Please Try Again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <title>A Slice of Technology</title>
        <link rel="stylesheet" href="css/stylesheet.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="index.php"><img src="images/img-rpi-01-small.png" alt="A Slice of Technology"></a>
            </div>
            <?php if (!isset($_SESSION['user'])) { ?>
                <form id="login" action="<?= $basename; ?>" method="post" autocomplete="off">
                    <input type="hidden" name="action" value="login">
                    <label for="username">username</label>
                    <input id="username" type="text" name="username" value="" tabindex="1" autofocus>
                    <label for="password">password</label>
                    <input id="password" type="password" name="password" tabindex="2">
                    <input type="submit" name="submit" value="login" tabindex="3">
                </form>
            <?php } else { ?>
                
                <div id="logout">
                    <span>Welcome <?= $_SESSION['user']->username; ?>! <a href="logout.php">logout</a></span>
                </div>
            <?php }
           
            ?>
            <div id="calendarBox"><?= $myCalendar->generateCalendar(); ?></div>
        </div>
        <nav class="container nav-bar">
            <ul class="topnav" id="myTopnav">
                <li><a class="top-link" href="#" >&nbsp;</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="icon">
                    <a id="button" href='#'>&#9776;</a>
                </li>    
            </ul>

            <div class="socialMediaStyle">
                <ul id="socialIcons" class="socialIcons">
                    <li><a href="http://www.facebook.com/PepstersPlace"><img src="images/img-facebook-logo-25x25.png" alt="Pepster's Place Facebook Page" ></a></li>
                    <li><a href="http://twitter.com/#!/Strider64"><img src="images/img-twitter-logo-25x25.png" alt="Pepster's Twitter Profile" ></a></li>
                    <li><a href="http://www.linkedin.com/in/johnpepp"><img src="images/img-linkedin-logo-25x25.png" alt="John Pepp's LinkedIn Profile" ></a></li>
                    <li><a href="http://www.flickr.com/people/pepster/"><img src="images/img-flickr-logo-100x25.png" alt="John Pepp's Flickr Profile" ></a></li>
                </ul>
            </div>
        </nav>



        <div class="container page">