<?php
define('MVC', 1);

require_once 'app/config.php';
require_once COREPATH . 'autoload.php';
require_once COREPATH . 'utils.php';
require_once COREPATH . 'log.php';
require_once COREPATH . 'model.php';
require_once COREPATH . 'router.php';
require_once COREPATH . 'controller.php';

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

switch (ENVIRONMENT) {
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
		break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		else
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1);
}

ini_set('magic_quotes_runtime', 0);

if ((bool) ini_get('register_globals')) {
	$_protected = array(
		'_SERVER',
		'_GET',
		'_POST',
		'_FILES',
		'_REQUEST',
		'_SESSION',
		'_ENV',
		'_COOKIE',
		'GLOBALS',
		'HTTP_RAW_POST_DATA',
		'SYSPATH',
		'APPPATH',
		'VIEWPATH',
		'_protected',
		'_registered'
	);

	$_registered = ini_get('variables_order');
	foreach (array('E' => '_ENV', 'G' => '_GET', 'P' => '_POST', 'C' => '_COOKIE', 'S' => '_SERVER') as $key => $superglobal) {
		if (strpos($_registered, $key) === FALSE)
			continue;

		foreach (array_keys($$superglobal) as $var) {
			if (isset($GLOBALS[$var]) && !in_array($var, $_protected, TRUE))
				$GLOBALS[$var] = NULL;
		}
	}
}

set_error_handler('error_handler');
set_exception_handler('exception_handler');
register_shutdown_function('shutdown_handler');

router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
