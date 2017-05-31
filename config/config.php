<?php
/* Turn on error reporting */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_URL) == "localhost") {
    error_reporting(-1); // -1 = on || 0 = off
} else {
    error_reporting(0); // -1 = on || 0 = off
}

define('EMAIL_HOST', 'your_email_host');
define('EMAIL_USERNAME', 'your_email_username');
define('EMAIL_PASSWORD', 'your_email_password');
define('EMAIL_ADDRESS', 'your_email_email');
define('EMAIL_PORT', 587); // It's usurally port 587 for the localserver:
/*
 * You can get your own public / private reCAPTCHA keys plus instructions how to install it here ->
 * https://www.google.com/recaptcha/intro/invisible.html
 */
define('PRIVATE_KEY', 'your_google_private_security_key'); //

if (filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_URL) == "localhost") {
  define('DATABASE_HOST', 'localhost'); 
  define('DATABASE_NAME', 'database_name');
  define('DATABASE_USERNAME', 'root'); // usually root:
  define('DATABASE_PASSWORD', 'localhost_password');
  define('DATABASE_TABLE', 'users');
} else {
  define('DATABASE_HOST', 'remote_host');
  define('DATABASE_NAME', 'database_name');
  define('DATABASE_USERNAME', 'remote_username');
  define('DATABASE_PASSWORD', 'remote_password');
  define('DATABASE_TABLE', 'users');
}
