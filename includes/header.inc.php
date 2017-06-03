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
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="icon">
                    <a id="button" href='#'>&#9776;</a>
                </li>    
            </ul>
        </nav>
        <div class="container page">