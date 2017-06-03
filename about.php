<?php
require 'config/config.php';
require "vendor/autoload.php";

use Library\Calendar\Calendar;
use Library\Database\Database as DB;
use Library\CMS\CMS;

$data = []; // Array

$db = DB::getInstance();
$pdo = $db->getConnection();

$myCalendar = new Calendar();

$myCalendar->phpDate();

$blog = new CMS();

$cms = $blog->read('article2');
require 'includes/header.inc.php';
?>
<div class="m-span7 aside-style">
    <div class="textBox2">
        <h1 class="cms_title"><?php echo $cms->title; ?></h1>
        <img class="textWrapLeft" src="images/img-john-01.png" alt="Profile Picture of John Pepp">
        <p><?php echo nl2br($cms->comment); ?></p>
    </div>
</div>
<?php
require 'includes/footer.inc.php';

