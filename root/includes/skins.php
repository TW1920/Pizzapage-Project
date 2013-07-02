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


class skin {
	var $filename;

	public function __construct($filename) {
		$this->filename = $filename;
	}
	
	public function mk($filename) {
		$this->filename = $filename;
		return $this->make();
	}
	
	//load template file
	public function make() {
		$file = sprintf('./skin/%s.html', $this->filename);
		$fh_skin = fopen($file, 'r');
		$skin = @fread($fh_skin, filesize($file));
		fclose($fh_skin);
		
		return $this->parse($skin);
	}
	
	//parse template
	private function parse($skin) {
		global $TMPL;
		
		$skin = preg_replace_callback('/{\$([a-zA-Z0-9_]+)}/', create_function('$matches', 'global $TMPL; return (isset($TMPL[$matches[1]])?$TMPL[$matches[1]]:"");'), $skin);
	
		return $skin;
	}
}
?>
