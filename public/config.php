<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:host=mysql;dbname=testdb');
define('DB_USERNAME', 'testuser');
define('DB_PASSWORD', 'password');

session_start();

require_once(__DIR__ . '/functions.php');
