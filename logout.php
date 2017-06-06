<?php
require_once 'config/config.php';

use Library\CMS\CMS;

$blog = new CMS();

$result = $blog->delete();

if ($result) {
    header('Location: about.php');
    exit();
}