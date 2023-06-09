<?php

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}
function redirect($link)
{
	header("Location: ". ROOT."/".$link);
	die;
}

function message($msg = '',$erase = false)
{

	if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}else{

		if(!empty($_SESSION['message']))
		{
			$msg = $_SESSION['message'];
			if($erase){
				unset($_SESSION['message']);
			}
			return $msg;
		}
	}

	return false;
}
function set_value($key, $default = '')
{

	if(!empty($_POST[$key]))
	{
		return $_POST[$key];
	}else
	if(!empty($default))
	{
		return $default;
	}

	return '';
}



function set_checked($key, $value, $default = '')
{

	if(!empty($_POST[$key]))
	{
		if($value == $_POST[$key]){
			return ' checked ';
		}
	}else
	if(!empty($default))
	{
		if($value == $default){
			return ' checked ';
		}
	}

	return '';
}