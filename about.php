<?php
require 'config/config.php';

use Library\Calendar\Calendar;
use Library\Database\Database as DB;
use Library\CMS\CMS;
use Library\Email\Email;

$data = []; // Array

$db = DB::getInstance();
$pdo = $db->getConnection();

$myCalendar = new Calendar();

$myCalendar->phpDate();

$blog = new CMS();

$cms = $blog->read($basename);
require 'includes/header.inc.php';
?>
<div class="m-span7 aside-style">
    <div class="textBox2">
        <?php echo isset($_SESSION['user']) ? '<a class="edit" href="modify.php?id=' . $cms->id .' ">edit</a>' : NULL; ?>
        <h1 class="cms_title"><?php echo $cms->title; ?><span>Created on <?php echo $cms->date_created; ?></span></h1>
        <img class="textWrapLeft" src="images/img-john-01.png" alt="Profile Picture of John Pepp">
        <p><?php echo nl2br($cms->comment); ?></p>
    </div>
</div>
<?php
require 'includes/footer.inc.php';

