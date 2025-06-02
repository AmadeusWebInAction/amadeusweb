<?php
if (endsWith(variable('file'), 'seeds-and-students/home.php')) {
	variable('submenu-at-node', false);
	setSubTheme('crowdfunding');
}


variables([
	'nodeChildSlug' => 'projects/seeds-and-students/',
	'nodeSiteName' => 'Seeds and Students | SeaMovement',
	'node1SafeName' => variable('nodeSafeName'),
	'nodeSafeName' => 'amw-nature-sea-seeds',
]);
