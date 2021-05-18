<?php
defined('MVC') or exit('No direct script access allowed');

class controller
{
	public $name;

	function __construct()
	{
	}

	function __destruct()
	{
	}

	public function index($request, $argument)
	{
		file_log('NOTE', 'index(' . $argument . ') not found');
		http_response_code(404);
		include VIEWPATH . 'view_error.php';
		exit(1);
	}

	public static function view($path, $data = [])
	{
		include VIEWPATH . $path . '.php';
	}
}
