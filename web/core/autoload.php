<?php
defined('MVC') or exit('No direct script access allowed');

spl_autoload_register(function ($className) {
	$modlFile = MODLPATH . $className . '.php';
	$ctrlFile = CTRLPATH . $className . '.php';
	if (file_exists($modlFile))
		include_once $modlFile;
	else if (file_exists($ctrlFile))
		include_once $ctrlFile;
});
