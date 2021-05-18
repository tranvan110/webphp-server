<?php
defined('MVC') or exit('No direct script access allowed');

//////////////////////////////////////////////////////////////////////////////////
function getIP()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
		$ipaddr = $_SERVER['HTTP_CLIENT_IP'];
	elseif (!empty($_SERVER['HTTP_FORWARDED']))
		$ipaddr = $_SERVER['HTTP_FORWARDED'];
	elseif (!empty($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddr = $_SERVER['HTTP_FORWARDED_FOR'];
	elseif (!empty($_SERVER['HTTP_X_FORWARDED']))
		$ipaddr = $_SERVER['HTTP_X_FORWARDED'];
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else
		$ipaddr = $_SERVER['REMOTE_ADDR'];

	return $ipaddr;
}

