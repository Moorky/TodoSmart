<?php

session_start();
require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/libs/helpers.php';
require_once __DIR__ . '/../src/libs/flash.php';
require_once __DIR__ . '/../auth/src/libs/sanitization.php';
require_once __DIR__ . '/../auth/src/libs/validation.php';
require_once __DIR__ . '/../auth/src/libs/filter.php';
require_once __DIR__ . '/libs/connection.php';
require_once __DIR__ . '/../auth/src/auth.php';
require_once __DIR__ . '/../app/src/databaseHandler.php';