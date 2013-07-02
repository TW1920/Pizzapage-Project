<?php
/**
*
* @package Pizzaproject 1.0 Beta
* @author TW1920 (Thomas Wolf) TW1920@twcmail.de
* @version $Id: *.php 9470 2013-07-01 20:52:41Z  $
* @copyright (c) 2013 TWCmail
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
/**
* @ignore
*/


#error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);

$conf = $TMPL = array();
$conf['host'] = 'localhost';
$conf['user'] = 'DBUSERNAME';
$conf['pass'] = 'BBPASSWORD';
$conf['name'] = 'pizzaproject';
$conf['url'] = 'Your URL of the page'; 

//set the action
$action = array('order'       => 'page',
				'about'	=> 'page',
				'contact'       => 'page',
				'welcome'       => 'page',				
				'reg'			=> 'page'
				);
				
/* if(get_magic_quotes_gpc()) {
	function strips($v) {return is_array($v)?array_map('strips',$v):stripslashes($v);}
	$_GET = strips($_GET);
} */
?>