<?php
/**
Open source CAD system for RolePlaying Communities.
Copyright (C) 2017 Shane Gill

This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

This program comes with ABSOLUTELY NO WARRANTY; Use at your own risk.
**/

if ( !defined('ABSPATH') )
{
	header('Location: index.php');
}

/** Provides support for enviorments running PHP < 5.5 */
if (version_compare(PHP_VERSION, '5.5', '<' )) {
	require_once(ABSPATH . 'vendors/password_compat/password.php');
}

/**#@+
 * function get_avatar()
 * Function fetches user's gravatar based on their profile email, if one
 * doesn't exist then default to a silhouette.
 *
 * @source https://gravatar.com/site/implement/images/php/
 *
 * @since 1.0a RC2
 *
 **/
function get_avatar() {
		if (defined( 'USE_GRAVATAR' ) && USE_GRAVATAR) {
			$url = 'https://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $_SESSION['email'] ) ) );
	    $url .= "?size=200&default=https://i.imgur.com/VN4YCW7.png";
	    return $url;
		}else{
			return "https://i.imgur.com/VN4YCW7.png";
		}
}

/**#@+
  * function getMySQLVersion()
	* Get current installed version of MySQL.
	*
	* @since 1.0a RC2
	*
	**/
function getMySQLVersion()
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	/* print server version */
	printf($mysqli->server_info);

	/* close connection */
	$mysqli->close();
}

/**#@+
	* function pageLoadTime();
  * Get page load time
	*
	* @since 1.0a RC2
	*
  **/
function pageLoadTime() {
		$time = microtime(true);
		$time = explode(' ', $time);
		$time = $time[0];
		$finish = $time;
		$total_time = $finish/60/60/60/60/60;
		$final_time = round(($total_time), 2);
		echo 'Page generated in '.$final_time.' seconds.';
}

function getApiKey()
{
	if(empty(API_KEY))
	{
		return generateRandomString(64);
	}
	else
		return API_KEY;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**#@+
  * function getOpenCADVersion()
	* Get current installed version of OpenCAD.
	*
	* @since 0.2.0
	*
	**/
function getOpenCADVersion()
{
	echo getATVGCADVersion()['version'];
}

function getOpenCADBuild()
{
	echo getATVGCADVersion()['build'];
}

function getOpenCADBase()
{
	echo getATVGCADVersion()['base'];
}

function getOpenCADHash()
{
	echo getATVGCADVersion()['build'];
}

function getATVGCADVersion()
{
	$data['version'] = "1.1.0.4";
	$out = array();
	exec("git log",$out);
	$data['build'] = substr($out[0], strlen('commit '));
	$data['base'] = "0.2.3";
	return $data;
}

?>
