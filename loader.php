<?php
include_once __DIR__ . '/../amadeus8/entry.php';

DEFINE('SITENAME', basename(SITEPATH));
DEFINE('CDNPATH', $cdn = __DIR__ . '/assets(amw)/');

variables([
	'network' => true,
	assetKey(NETWORKASSETS, ASSETFOLDER) => CDNPATH,
	assetKey(NETWORKASSETS) => variable('local') ? 'http://localhost/amadeusweb/assets(amw)/' : '//cdn.amadeusweb.site/',
]);

addStyle('network', NETWORKASSETS);

variables([
	'link-to-site-home' => true,
	'link-to-section-home' => true,
]);

function site_before_render() {
	if (DEFINED('SPLASH')) variable('node', 'splash');

	if (DEFINED('NODEPATH'))
		variable('submenu-at-node', true);

	if (function_exists('node_before_render')) node_before_render();
}

function did_site_render_page() {
	if (DEFINED('SPLASH')) return true;
}

function enrichThemeVars($vars, $what) {
	if ($what == 'header' && variable('node') == 'splash') {
		$vars['optional-slider'] = getSnippet('splash', CDNPATH . 'snippets/');
	}

	if (function_exists('enrichNodeThemeVars'))
		$vars = enrichNodeThemeVars($vars, $what);

	return $vars;
}

function before_file() {
	if (!DEFINED('SPLASH')) {
		echo getSnippet('countdown', CDNPATH . 'snippets/');
	}
}

function before_footer_assets() {
	if (SITENAME == 'world')
		echo getThemeSnippet('floating-button');
}

runFrameworkFile('site');
