<?php
/* Turn on error reporting */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_URL) == "localhost") {
    error_reporting(-1); // -1 = on || 0 = off
} else {
    error_reporting(0); // -1 = on || 0 = off
}

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
