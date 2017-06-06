<?php
require 'config/config.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
} elseif (isset($_SESSION['user']->security_level) && $_SESSION['user']->security_level === 'public') {
    header('Location: index.php');
    exit();
}

use Library\Calendar\Calendar;
use Library\Database\Database as DB;
use Library\CMS\CMS;
use Library\Email\Email;

$myCalendar = new Calendar();

$myCalendar->phpDate();

$blog = new CMS();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
$return_page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);


$cms = $blog->read_modify($id);

$submit = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (isset($submit) && $submit === 'modify') {
    $data['id'] = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $data['user_id'] = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['article'] = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['title'] = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['comment'] = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data['return_page'] = filter_input(INPUT_POST, 'return_page', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $myURL = $blog->update($data);
    if ($myURL) {
        header("Location: " . $myURL);
        exit();
    }
}
require_once 'includes/header.inc.php';
?>
<div class="m-span7 aside-style">
    <form id="modify"  action="<?php echo $basename; ?>" method="post">
        <fieldset>
            <legend>Edit Record Number <?=  $cms->id; ?></legend>
            <input type="hidden" name="action" value="modify">
            <input type="hidden" name="id" value="<?= $cms->id; ?>">
            <input type="hidden" name="user_id" value="<?= $cms->user_id; ?>">
            <input type="hidden" name="return_page" value="<?= $return_page; ?>">
            <label for="title">Title</label>
            <input id="title" name="title" value="<?= $cms->title; ?>" tabindex="1" autofocus>
            <label class="textareaLabel" for="comment">Comment</label>
            <textarea id="comment" name="comment" tabindex="2"><?= $cms->comment; ?></textarea>
            <input type="submit" name="submit" value="submit" tabindex="3">
        </fieldset>
    </form>
</div>
<?php
require 'includes/footer.inc.php';
