<?php
include_once __DIR__ . '/../amadeus8/entry.php';


variables([
	'network' => true,
	assetKey(NETWORKASSETS, ASSETFOLDER) => __DIR__ . '/assets(amw)/',
	assetKey(NETWORKASSETS) => variable('local') ? 'http://localhost/amadeusweb/assets(amw)/' : 'http://cdn.amadeusweb.site/',
]);

addStyle('network', NETWORKASSETS);

runFrameworkFile('site');
