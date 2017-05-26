<?php
require 'src/includes/config.php';
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
        <meta charset="UTF-8">
        <title>Images &amp; The Raspberry Pi</title>
        <link rel="stylesheet" href="src/css/stylesheet.css">
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <h1>Images and More!</h1>
                <p>Coming Soon!</p>
            </div>
            <div id="calendarBox"><?= $myCalendar->generateCalendar(); ?></div>
        </div>
    </body>
</html>
