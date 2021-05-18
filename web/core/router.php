<?php
defined('MVC') or exit('No direct script access allowed');

//////////////////////////////////////////////////////////////////////////////////
function router($request, $url)
{
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$path = parse_url($url)['path'];

	if (RENDERMODE == 'single_page_app' && !preg_match('/^\/api\/.*/', $path)) {
		controller::view('view_index');
		exit(1);
	}

	$match = false;
	foreach ($GLOBALS['routes'] as $key => $value) {
		$regex = '/^' . preg_replace('/\//', '\/', $key) . '/';
		$regex = preg_replace('/\$1/', '(.+)', $regex);
		$regex = preg_replace('/\$2/', '(.+)', $regex);
		$regex = preg_replace('/\$3/', '(.+)', $regex);

		if (preg_match($regex, $path, $matches)) {
			$count = count($matches);
			if ($count > 1)
				$value = preg_replace('/\$1/', $matches[1], $value);
			if ($count > 2)
				$value = preg_replace('/\$2/', $matches[2], $value);
			if ($count > 3)
				$value = preg_replace('/\$3/', $matches[3], $value);

			$match = true;
			break;
		}
	}

	if (!$match) {
		file_log('NOTE', 'routes' . '[' . $path . '] not found');
		http_response_code(404);
		controller::view('view_error');
		exit(1);
	}

	$expaths = explode('/', $value);
	$count = count($expaths);

	if ($count > 3)
		$argument = $expaths[3];
	else
		$argument = '';
	if ($count > 2)
		$method = $expaths[2];
	else
		$method = 'index';
	if ($count > 1)
		$class = $expaths[1];
	else
		$class = 'home';

	if ($class == '')
		$class = 'home';
	if ($method == '')
		$method = 'index';

	$class = filter_var($class, FILTER_SANITIZE_STRING);
	$method = filter_var($method, FILTER_SANITIZE_STRING);
	$argument = filter_var($argument, FILTER_SANITIZE_STRING);

	if (!class_exists($class)) {
		file_log('NOTE', $class . '->' . $method . '(' . $argument . ') not found');
		http_response_code(404);
		controller::view('view_error');
		exit(1);
	}

	$controller = new $class();
	if (!method_exists($controller, $method)) {
		file_log('NOTE', $method . '(' . $argument . ') not found');
		http_response_code(404);
		controller::view('view_error');
		exit(1);
	}

	switch ($request) {
		case 'GET':
		case 'POST':
		case 'PUT':
		case 'DELETE':
			$controller->$method($request, $argument);
			break;
		default:
			file_log('NOTE', $request . ' request not allowed');
			http_response_code(405);
			controller::view('view_error');
			exit(1);
			break;
	}
}
