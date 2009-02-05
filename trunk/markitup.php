<?php

# Setup and Hooks for the MarkItUp extension.

/* MarkItUp Mediawiki Extension
 *
 * @author Carlo Polisini (capolise at gmail dot com)
 * @credits http://markitup.jaysalvat.com
 * @licence GNU General Public Licence 2.0 or later
 * @description Replace the default edit toolbar with the Markitup toolbar.
 *
 */
if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die();
}

## Register extension setup hook and credits:
$wgExtensionFunctions[]	= 'fnMarkitup';
$wgExtensionCredits['parserhook'][] = array(
	'name'		=> 'MarkitUpMW (version 0.1)',
	'author'	=> 'Carlo Polisini <capolise at gmail dot com>',
	'url'		=> 'http://www.mediawiki.org/wiki/Category:Extensions',
	'description'	=> 'Replace the default edit toolbar with the Markitup toolbar.'
);

function fnMarkitup() {
	global $wgHooks;
	# Hook when starting editing:
	$wgHooks['EditPage::showEditForm:initial'][] ='fnMarkitupShowHook';
}

function fnMarkitupShowHook() { 
	global $wgOut, $wgScriptPath;
    # ADD JQUERY JAVASCRIPT
	$wgOut->addScript( "<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/MarkitUpMW/jquery.pack.js\"></script>\n<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/MarkitupMW/markitup/jquery.markitup.pack.js\"></script>\n" );
    # ADD JAVASCRIPT
	$wgOut->addScript( "<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/MarkitUpMW/markitup/sets/wiki/set.js\"></script>\n<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/MarkitupMW/markitup.js\"></script>\n");
    # ADD CSS
	$wgOut->addScript( "<link type=\"text/css\" href=\"" . $wgScriptPath . "/extensions/MarkitUpMW/markitup/skins/markitup/style.css\" rel=\"stylesheet\"></link>\n");
	$wgOut->addScript( "<link type=\"text/css\" href=\"" . $wgScriptPath . "/extensions/MarkitUpMW/markitup/sets/wiki/style.css\" rel=\"stylesheet\"></link>\n");
	return true;
}
