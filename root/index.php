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


//include other files
require_once('./includes/config.php');
require_once('./includes/skins.php');
require_once('./includes/functions.php');

//connect db
mysql_connect($conf['host'], $conf['user'], $conf['pass']);
mysql_query('SET NAMES utf8');
mysql_select_db($conf['name']);

//choose the page	
if(isset($_GET['a']) && isset($action[$_GET['a']])) {
	$page_name = $action[$_GET['a']];
	$TMPL['headerClass'] = 'header';
	$TMPL['contentClass'] = 'container';
	$TMPL['footerClass'] = 'footer';
} else {
	$page_name = $action['welcome'];
	$TMPL['headerClass'] = 'header';
	$TMPL['contentClass'] = 'container';
	$TMPL['footerClass'] = 'footer';
}

//define url
$confUrl = $conf['url'];
$confMail = $conf['mail'];

//set the template arrys
$TMPL['title'] = $resultSettings[0];
$TMPL['content'] = PageMain();


if ($_GET['a'] == 'reg') {
	
	$p1gs = 0;
	$p1ks = 0;
	$p2gs = 0;
	$p2ks = 0;	
	
	if (isset ($_GET['p1g'])) {
		$p1g = $_GET['p1g'];
		$p1gs = $p1g*10;
	}
	if (isset ($_GET['p1k'])) {
		$p1k = $_GET['p1k'];
		$p1ks = $p1k*5;
	}
	if (isset ($_GET['p2g'])) {
		$p2g = $_GET['p2g'];
		$p2gs = $p2g*10;
	}
	if (isset ($_GET['p2k'])) {
		$p2k = $_GET['p2k'];
		$p2ks = $p2k*5;
	}

	$summe = $p1gs+$p1ks+$p2ks+$p2gs;

	$empfaenger = $_GET['email'];
	$betreff = "Ihre Pizzabestellung";
	$from="From:Thomas Wolf<tw1920@twcmail.de>\n";
	$from .= "Reply-To: info@twcmail.de\n";
	$from .= "Bcc: pizza@twcmail.de\n";
	$from .= "X-Mailer: PHP/" . phpversion(). "\n";
	$from .= "X-Sender-IP: $REMOTE_ADDR\n";
	$from .= "Content-Type: text/html";

	$text = "Wir haben Ihre Bestellung in Höhe von $summe € erhalten";

	mail($empfaenger, $betreff, $text, $from);
}


$resultSettings = mysql_fetch_row(mysql_query(getSettings($querySettings)));

$TMPL['url'] = $conf['url'];

$skin = new skin('wrapper');
echo $skin->make();

mysql_close();
?>