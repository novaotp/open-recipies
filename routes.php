<?php

require_once(__DIR__.'/router.php');

get('/', 'pages/index.php');

get('/auth/sign-up', 'pages/auth/sign-up/index.php');
post('/auth/sign-up', 'pages/auth/sign-up/index.php');

get('/auth/log-in', 'pages/auth/log-in/index.php');
post('/auth/log-in', 'pages/auth/log-in/index.php');

get('/app', 'pages/app/index.php');

any('/404', 'pages/404.php');
