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
    /* The Following to get response back from Google recaptcah */
    $url = "https://www.google.com/recaptcha/api/siteverify";

    $remoteServer = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_SANITIZE_URL);
    $response = file_get_contents($url . "?secret=" . PRIVATE_KEY . "&response=" . \htmlspecialchars($_POST['g-recaptcha-response']) . "&remoteip=" . $remoteServer);
    $recaptcha_data = json_decode($response);
    /* The actual check of the recaptcha */
    if (isset($recaptcha_data->success) && $recaptcha_data->success === TRUE) {
        $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['phone'] = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['website'] = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['reason'] = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['comments'] = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $send = new Email($data, $transport);
    } else {
        $success = "You're not a human!";
    }
}
require 'includes/header.inc.php';
?>
<div class="m-span7 form-container">
    <form id="contact" action="contact.php" method="post"  autocomplete="on">

        <fieldset>

            <legend><?php echo (isset($message)) ? $message : 'Contact Form'; ?></legend>

            <label for="name" accesskey="U">Name</label>
            <input name="name" type="text" id="name" tabindex="1" autofocus required="required" />

            <label for="email" accesskey="E">Email</label>
            <input name="email" type="email" id="email" tabindex="2" required="required" />

            <label for="phone" accesskey="P" tabindex="3">Phone <small>(optional)</small></label>
            <input name="phone" type="tel" id="phone">

            <label for="website" accesskey="W" tabindex="4">Website <small>(optional)</small></label>
            <input name="website" type="text" id="website">

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
            <div class="g-recaptcha" data-sitekey="6LfPlQoUAAAAAPgD3PpnQ_uGTzc87UALiFgQ3XnK"></div>
            <input type="submit" name="submit" value="submit" tabindex="7">
        </fieldset>



    </form>
</div>
<?php
require 'includes/footer.inc.php';
