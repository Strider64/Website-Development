<?php
require 'config/config.php';
require "vendor/autoload.php";

use Library\Calendar\Calendar;
use Library\Database\Database as DB;


$data = []; // Array

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
                <li><a href="contact.php">Contact</a></li>
                <li class="icon">
                    <a id="button" href='#'>&#9776;</a>
                </li>    
            </ul>
        </nav>
        <div class="container page">
            <div class="m-span6 main-content">
                <h1>Welcome to A Slice of Technology!</h1>
                <p>A Slice of Technology is a hodgepodge of everything that relates to technology. Web Design, Web Development, Computer Building, Raspberry Pi Projects, Photography, Bird Feeder Web Camera are just a few topics that this web site will cover. I have <a class="links" href="https://github.com/Strider64?tab=repositories">Github Repositories</a> that will help people in developing web sites and when further help is needed I will provide links to tutorials that I consider to be useful.</p>
                <figure class="imageStyle">
                    <img src="images/img-iMac-01-500x375.png" alt="27-inch iMac with Retina 5K display" >
                    <figcaption>27-inch iMac with Retina 5K display</figcaption>
                </figure>
                <p>All my web development is done on a 27-inch iMac with 5K display with a Wacom Cintiq 13HD Interactive Pen Display. My monitors are color calibrated with an X-Rite i1Display color spectrometer.</p>
                <figure class="imageStyle">
                    <img src="images/img-epson-p800-printer-500x375.png" alt="epson p800 printer">
                    <figcaption>Epson P800 Printer</figcaption>
                </figure>
                <P>In addition I will be offering a small printing service using an Epson P800 printer that produces long lasting professional prints. In additional to professional personal prints, I will be offering a monthly wall 2018 wall calendar printed on satin canvas paper.</P>
            </div>
            <div class="m-span6 aside-content"> 
                <iframe src="https://www.youtube.com/embed/r_Ri2jTAtOU" allowfullscreen></iframe>
                <h1>The rPi Bird Feeder Project</h1>
                <p>The above is a video of a bird feeder that I put on my bedroom window. The video was taken with a Raspberry Pi Camera connected to a Raspberry Pi computer. This project is a fun and I'm still not completely done with it, for I want to be able to access the video via this web site. The Raspberry Project has cost me roughly $220 so far and proving that projects don't have to be expensive. I probably could had kept the project under a $100 had I not purchased a 7" LCD and a case for the rPi &amp; screen.</p>
                <figure class="imageStyle">
                    <img src="images/img-raspberry-pi-01-500x375.png" alt="Raspberry Pi 3 Computer">
                    <figcaption>Raspberry Pi 3 with 7" TFT Screen</figcaption>
                </figure>
                <h2>The rPi Bird Feeder Project List</h2>
                <ul class="product-list">
                    <li>Raspberry Pi 3 Model B <span>$36.00</span></li>
                    <li>Raspberry Pi 7" Touchscreen Display <span>$70.00</span></li>
                    <li>Case for the rPi &amp; 7" Touchscreen Display <span>$28.00</span></li>
                    <li>Raspberry Pi Camera Module V2 <span>$30.00</span></li>
                    <li>2.4 GHz Mini Wireless Keyboard <span>$22.00</span> </li>
                    <li>32 microSD card <span>$25.00</span></li>
                    <li>Adafruit Flex Cable (2 meters) <span>$8.00</span></li>
                    <li>5V 2.5A Power Supply <span>$9.00</span></li>
                </ul>
                <p>The above is the product list of all the components that is needed for the Raspberry Pi Project and the total cost is $228.00. I personally did not have to purchase the power supply, so that cut my cost down a little bit. You can use a phone charger, but make sure it has enough voltage/amperage in order to power everything.</p>
                <figure class="imageStyle">
                    <img src="images/img-rpi3camera-setup-500x375.png" alt="Raspberry Pi 3 with Camera V2 setup">
                    <figcaption>Raspberry Pi with Raspberry Pi Camera V2</figcaption>
                </figure>
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
