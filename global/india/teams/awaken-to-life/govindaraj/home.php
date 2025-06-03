<?php
/*
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-journal"><div><i class="bi-journal-text"></i> Journal</div></a></li>
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-research"><div><i class="bi-binoculars"></i> Research</div></a></li>
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-blog"><div><i class="bi-pencil"></i> Blog</div></a></li>
<li class="menu-item"><a class="menu-link" href="#" data-href="#section-contact"><div><i class="bi-envelope-open"></i> Contact</div></a></li>
*/

/*
https://canvastemplate.com/demo-crowdfunding-single.html
*/
$page = 'academic';
//$lightboxId = '#panel-engage';

$sections = [
	'about' => [
		'person-name' => 'J Govindaraj',
		'person-image' => getHtmlVariable('node-assets') . 'atl-govindaraj.png',
		'testimonial' => 'lorem ipsum',
		'testimonial-by' => 'someone!',
		'left-tagline' => 'XYZ Positions',
		'left-items' => getFileItems($page, 'about-left-item', [
			['what' => 'Professor', 'where' => 'MIT, Course - Jun 3rd 2022'],
		]),
		'right-tagline' => 'ABC Education',
		'right-items' => getFileItems($page, 'about-right-item', [
			['what' => 'Ph.D. in Course', 'where' => 'University of NY - 2021'],
		]),
	],
];

foreach ($sections as $name => $item) {
	if ($name == 'raw') {
		echo $item;
		continue;
	}

	$template = getThemeSection($page, $name);
	echo replaceItems($template, $item, '%');
}

function getFileItems($page, $template, $items) {
	$item = getThemeSection($page, $template);
	$result = [];
	foreach ($items as $ix => $vars) {
		$result[] = replaceItems($item, $vars, '%');
	}
	return implode(NEWLINES2, $result);
}
