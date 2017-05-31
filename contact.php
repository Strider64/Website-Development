<?php
require 'config/config.php';
require "vendor/autoload.php";

use Library\Calendar\Calendar;
use Library\Database\Database as DB;
use Library\Email\Email;

$db = DB::getInstance();
$pdo = $db->getConnection();

$myCalendar = new Calendar();

$myCalendar->phpDate();

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (isset($submit) && $submit === 'submit') {
    $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['phone'] = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['website'] = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['reason'] = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['comments'] = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $send = new Email($data, $transport);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <title>A Slice of Technology</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="index.php"><img src="images/img-rpi-01-small.png" alt="A Slice of Technology"></a>
            </div>
            <div id="calendarBox"><?= $myCalendar->generateCalendar(); ?></div>
        </div>
        <nav class="container nav-bar">
            <ul class="topnav" id="myTopnav">
                <li><a class="top-link" href="#" >&nbsp;</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="https://www.triviaintoxication.com/">Trivia</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="icon">
                    <a id="button" href='#'>&#9776;</a>
                </li>    
            </ul>
        </nav>
        <div class="container page">
            <div class="m-span6 form-container">
                <form id="contact" action="contact.php" method="post"  autocomplete="on">

                    <fieldset>

                        <legend><?php echo (isset($message)) ? $message : 'Contact Details'; ?></legend>

                        <label for="name" accesskey="U">Name</label>
                        <input name="name" type="text" id="name" tabindex="1" autofocus required="required" />

                        <label for="email" accesskey="E">Email</label>
                        <input name="email" type="email" id="email" tabindex="2" required="required" />

                        <label for="phone" accesskey="P" tabindex="3">Phone <small>(optional)</small></label>
                        <input name="phone" type="tel" id="phone">

                        <label for="website" accesskey="W" tabindex="4">Website <small>(optional)</small></label>
                        <input name="website" type="text" id="website">

                    </fieldset>

                    <fieldset>

                        <legend>Your Comments</legend>

                        <div class="radioBlock">
                            <input type="radio" id="radio1" name="reason" value="support" tabindex="5" checked>
                            <label class="radioStyle" for="radio1">support</label>
                            <input type="radio" id="radio2" name="reason" value="advertise">
                            <label class="radioStyle" for="radio2">advertise</label>  
                            <input type="radio" id="radio3" name="reason" value="error">
                            <label class="radioStyle" for="radio3">Report a Bug</label>    
                        </div>

                        <label class="textBox" for="comments">Comments</label>
                        <textarea name="comments" id="comments" spellcheck="true" tabindex="6" required="required"></textarea>             
                        <input type="submit" name="submit" value="submit" tabindex="7">
                    </fieldset>



                </form>
            </div>
        </div>
        <footer class="container footer-style">
            <p class="footer-name">&copy;<?php echo date("Y"); ?> <span>John R. Pepp</span></p>
        </footer>
        <script>
            var button = document.getElementById('button');
            button.addEventListener("click", function (event) {
                event.preventDefault();
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            });
        </script>
    </body>
</html>
