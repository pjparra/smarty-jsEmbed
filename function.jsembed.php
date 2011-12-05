<?php
/*
 * Smarty plugin
 * ------------------------------------------------------------
 * Type:       function
 * Name:       jsembed
 * Purpose:    Automatically creates a <script> tag or embeds in-page JS if small enough (performance purposes)
 * Author:     Pierre-Jean Parra
 * Version:    1.0
 *
 * ------------------------------------------------------------
 */
function smarty_function_jsembed($params, &$smarty)
{
	$url = parse_url($params['src']);
	$filename = realpath($_SERVER['DOCUMENT_ROOT'] . $url['path']);
	if ( ! isset($params['threshold'])) {
		$params['threshold'] = 10000;
	}
	
	// Big file, let's externalize it
	if (filesize($filename) > $params['threshold']) {
		if ( ! empty($url['query'])) {
			$urlQuery = '?' . $url['query'];
		}
		else {
			$urlQuery = '';
		}
		return '<script src="' . $url['path'] . $urlQuery . '"></script>';
	}
	// Small file, let's embed it directly on the page
	else {
		return "<script>\n<!--\n" . file_get_contents($filename) . "\n//--></script>";
	}
}

?>