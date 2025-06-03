<?php
DEFINE('NODEPATH', __DIR__);

function node_before_render() {
	if (endsWith(variable('file'), 'home.php')) {
		variable('submenu-at-node', false);
		setSubTheme('academic');
	}
}

function enrichNodeThemeVars($vars, $where) {
	if ($where == 'header') {
		$social = [
			[ 'type' => 'email', 'url' => 'govind66@gmail.com', 'name' => 'Email Me' ],
			[ 'type' => 'whatsapp', 'url' => '919566044722', 'name' => 'WhatsApp Me' ],
		];
		$links = [];
		foreach ($social as $link) { $item = specialLinkVars($link); $links[] = getLink('', $item['url'], $item['class'] . ' fa-2xl me-3', true); }

		if (endsWith(variable('file'), 'govindaraj/home.php')) {
			$vars['person-name'] = 'J Govindaraj';
			$vars['person-image'] = replaceHtml('%node-assets%atl-govindaraj-square.png');
			$vars['person-title'] = 'Math Educationist and Business Consultant';
			$vars['bottom-menu'] = '<div class="text-center m-4">' . site_and_node_icons() . '<hr>' . implode('', $links) . '</div>';
			$vars['one-page-menu'] = '
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-about"><div><i class="bi-person-circle"></i> About</div></a></li>
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-works"><div><i class="bi-briefcase"></i> Works</div></a></li>
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-experience"><div><i class="bi-person-gear"></i> Experience</div></a></li>
';
		}
	}

	return $vars;
}

variables([
	'nodeChildSlug' => 'awaken-to-life/',
	'nodeSiteName' => 'AwakenToLife.org | AWG / India',
	//'node1SafeName' => 'teams',
	'nodeSafeName' => 'amw-atl',
]);
