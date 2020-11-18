<?php

    define('DB_USER', 'root');
    define('DB_PASSWORD', '12345678');
    define('DB_NAME', 'agenda');
    define('DB_HOST', 'localhost');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
