<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/auth.php');

Auth::destroy();

header("Location: /auth/log-in");
