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


//load settings
function getSettings($querySettings) {
	$querySettings = "SELECT * from settings";
	return $querySettings;
}

function local_redirect($redirecturl) {
	header("Location: $redirecturl");
}

//set titles
function PageMain() {
	global $TMPL;
	
	$title = array( 'reg'    => 'Bestellung versendet',
					'order'		 => 'Pizza Bestellen',
					'about'		 => 'About',
					'welcome' => 'Herzlich Willkommen',
					'contact'    => 'Kontakt');
	if(!empty($_GET['a']) && isset($title[$_GET['a']])) {
		$a = $_GET['a'];
		
		$resultSettings = mysql_fetch_row(mysql_query(getSettings($querySettings)));
		
		$TMPL['title'] = "{$title[$a]} - ".$resultSettings[0]."";
		$skin = new skin("page/$a");
		return $skin->make();
	} else {
		local_redirect('/');
	}
}

?>