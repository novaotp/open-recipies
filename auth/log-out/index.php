<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/authService.php');

AuthService::destroy();

header("Location: /auth/log-in");
