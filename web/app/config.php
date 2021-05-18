<?php
defined('MVC') or exit('No direct script access allowed');

define('LOGSPATH', 'logs/');
define('COREPATH', 'core/');
define('VIEWPATH', 'app/views/');
define('MODLPATH', 'app/models/');
define('CTRLPATH', 'app/controllers/');
define('PAGEPATH', 'app/views/pages/');
define('COMPPATH', 'app/views/components/');

define('LOGDAYS', 30);
define('RENDERMODE', 'multi_page_app');
// define('RENDERMODE', 'single_page_app');
date_default_timezone_set('Asia/Ho_Chi_Minh');

$routes['/$1-$2-$3'] = '/$1/$2/$3';
$routes['/$1/$2/$3'] = '/$1/$2/$3';
$routes['/$1/$2'] = '/$1/$2';
$routes['/$1'] = '/$1';
$routes['/'] = '/home';
