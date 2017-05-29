<?php
require 'config/config.php';
require "vendor/autoload.php";

use Library\Calendar\Calendar;
use Library\Database\Database as DB;

$db = DB::getInstance();
$pdo = $db->getConnection();

$myCalendar = new Calendar();

$myCalendar->phpDate();
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
                <li><a href="#">Contact</a></li>
                <li class="icon">
                    <a id="button" href='#'>&#9776;</a>
                </li>    
            </ul>
        </nav>
        <div class="container page">
            <div class="span6 main-content">
                <h1>Welcome to A Slice of Technology!</h1>
                <p>A Slice of Technology is a hodgepodge of everything that relates to technology. Web Design, Web Development, Computer Building, Raspberry Pi Projects, Photography, Bird Feeder Web Camera are just a few topics that this web site will cover. I have <a class="links" href="https://github.com/Strider64?tab=repositories">Github Repositories</a> that will help people in developing web sites and when further help is needed I will provide links to tutorials that I consider to be useful.</p>
                <P>In addition I will be offering a small printing service using an Epson P800 printer that produces long lasting professional prints. In additional to professional personal prints, I will be offering a monthly wall 2018 wall calendar printed on satin canvas paper.</P>
            </div>
            <div class="span6 aside-content">
                <img src="images/img-main-computer-02-small.jpg" alt="27-inch iMac with Retina 5K display" >
                <h1>27" iMac with Retina 5K display</h1>
                <p>This is the computer where I do 99 percent of my web design and development.</p>
                <br>
                <img src="images/img-rpi3-01-small.jpg" alt="Raspberry Pi 3 Computer">
                <img src="images/img-rsp3camera-setup.jpg" alt="Raspberry Pi 3 with Camera V2 setup">
                <h1>RPi3 with Raspberry Pi Camera</h1>
                <p>The above is a Raspberry Pi 3 with a Raspberry Pi Camera V2 that I have pointed at the window bird feeder. I have it where I can control via my iMac computer remotely and have taken some nice videos and pictures with it.</p>
                <br>
                <iframe src="https://www.youtube.com/embed/r_Ri2jTAtOU" allowfullscreen></iframe>
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
