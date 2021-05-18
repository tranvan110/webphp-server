<?php
defined('MVC') or exit('No direct script access allowed');

$logmsg = array();

//////////////////////////////////////////////////////////////////////////////////
function console_log($data)
{
	// if (str_ireplace(array('off', 'none', 'no', 'false', 'null'), '', ini_get('display_errors'))) {
	// 	array_push($GLOBALS['logmsg'], 'console.log(' . json_encode($data) . ');');
	// }
	if (ENVIRONMENT == 'development')
		array_push($GLOBALS['logmsg'], 'console.log(' . json_encode($data) . ');');
}

//////////////////////////////////////////////////////////////////////////////////
function file_log($code, $msg)
{
	$trace = debug_backtrace();
	$files = glob(LOGSPATH . "*.txt");
	$now   = time();

	foreach ($files as $file)
		if (is_file($file))
			if ($now - filemtime($file) >= 60 * 60 * 24 * LOGDAYS)
				unlink($file);

	$logFile = LOGSPATH . 'log.txt';
	// $logFile = LOGSPATH . 'log_' . date('m-d-Y') . '.txt';
	$message = $code . date(' [m-d-Y H:i:s T ') . getIP() . ' ' .
		$_SERVER['REQUEST_METHOD'] . ':' . $_SERVER['REQUEST_URI'] . '] ' .
		$trace[0]['file'] . ':' . strval($trace[0]['line']) . ' ' .  $msg . PHP_EOL;

	console_log($message);
	file_put_contents($logFile, $message, FILE_APPEND | LOCK_EX);
}

//////////////////////////////////////////////////////////////////////////////////
function error_handler($severity, $message, $filepath, $line)
{
	$isError = (((E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR | E_USER_ERROR) & $severity) === $severity);

	if (($severity & error_reporting()) == $severity) {
		if ($isError)
			console_log('ERROR ' . $filepath . ':' . $line . ' ' . $message);
		else
			console_log('WARNING ' . $filepath . ':' . $line . ' ' . $message);
	}

	if ($isError) {
		http_response_code(500);
		$content = file_get_contents('error.html');
		exit($content);
	}
}

//////////////////////////////////////////////////////////////////////////////////
function shutdown_handler()
{
	$err = error_get_last();
	if (
		isset($err) &&
		($err['type'] & (E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING))
	)
		error_handler($err['type'], $err['message'], $err['file'], $err['line']);
}

//////////////////////////////////////////////////////////////////////////////////
function exception_handler($ex)
{
	console_log('EXCEPTION ' . $ex->getFile() . ':' . $ex->getLine() . ' ' . $ex->getMessage());
	http_response_code(500);
	$content = file_get_contents('error.html');
	exit($content);
}
