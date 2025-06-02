<?php
/*
https://canvastemplate.com/demo-crowdfunding-single.html
*/
$page = 'crowdfunding';
$lightboxId = '#panel-engage';

$sections = [
	'masthead' => [
		'title' => '<u>Seeds and Students</u>',
		'introduction' => returnLinesNoParas('A Mission by [RK and friends](%url%../wiseowls/team-rk/~class~btnNBSPbtn-primary~/class~).'),
		'social-links' => '
			<a class="dropdown-item" href="#"><i class="fa-brands fa-facebook-f me-2"></i>Facebook</a>
			<a class="dropdown-item" href="#"><i class="fa-brands fa-twitter me-2"></i>Twitter</a>
			<a class="dropdown-item" href="#"><i class="fa-brands fa-whatsapp me-2"></i>Whatsapp</a>
			<a class="dropdown-item" href="#"><i class="bi-code me-2"></i>Embedded</a>
		',
		'tags' => csvToHashtags('students, envirornment, nature, garden, responsibility'), /*'
			<a href="#">Tech</a>
			<a href="#">Gadget</a>
			<a href="#">Popular</a>
			<a href="#">Most Loved</a>
		',
		*/
		'location' => 'Chennai, India',
	],

	'main-start' => [
		'video-embed' => runAllMacros('[video]https://cdn.pixabay.com/video/2024/12/04/244839_large.mp4[/video]'),
		//'video-embed' => runAllMacros('[youtube]PTIqjpkF5Ss[/youtube]'),
	],

	'pagemenu' => [
		'call-to-action-lightbox-id' => $lightboxId,
		'call-to-action-text' => 'CLICK HERE TO SUPPORT',
		'before-nav-items' => site_and_node_icons(null, null, '1'),
		'nav-items' => '
										<li class="page-menu-item"><a class="ms-0" data-href="#section-desc"><div>Description</div></a></li>
										<li class="page-menu-item"><a href="#" data-href="#section-updates"><div>Updates</div></a></li>
		',/*
										<li class="page-menu-item"><a href="#" data-href="#section-faqs"><div>FAQs</div></a></li>
										<li class="page-menu-item"><a href="#" data-href="#section-gallery"><div>Gallery</div></a></li>
										<li class="page-menu-item"><a href="#" data-href="#section-reviews"><div>Reviews</div></a></li>
		',*/
	],

	'entry-start' => [],

	'raw' => getFileSnippets(['description', 'updates'/*, 'faqs'*/]),

	'entry-end' => [],

	'main-end' => [
		'call-to-action-lightbox-id' => $lightboxId,
		//https://www.w3schools.com/php/func_string_number_format.asp
		'pledged-value' => number_format($current = 5000),
		'goal-value' => number_format($total = 280000),
		'pledged-percent' => ($current / $total) * 100,
		'days-left' => '68',
		'posted-by-link' => '#rk',
		'posted-by-name' => 'Radhakrishnan S',
		'posted-by-picture' => getHtmlVariable('node-assets') . 'rk-profile.jpg',
		'posted-by-message' => '<div class="pt-3 ps-4 text-end">' . markdown('I have been working with communities to create comprehensive solutions which help to adapt the **effects of Climate Change** in Tamil Nadu, India.

My work **revolves around** Food, Water, Energy, Environment and Health.

Present focus is to build partnerships and collaborations **between various stakeholders** which will help to influence decision makers.

We all need to shift our **Focus to Climate Emergency** and also make communities prepared to **adapt to the effects** of Climate Change.')
	. getLink('LinkedIn', 'https://www.linkedin.com/in/radhakrishnan-subbuduraisamy/', 'btn btn-primary', true) . '</div>',
		'' => '',
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

function getFileSnippets($items) {
	$fol = __DIR__ . '/_snippets/';
	$result = [];
	foreach ($items as $ix => $file) {
		//$result[] = runAllMacros('[spacer]' . humanize($file) . '[/spacer]');
		$result[] = renderAny($fol . $file . '.html', ['echo' => false]);
		if ($ix != count($items) - 1) $result[] = '										<div class="line"></div>';
	}
	return implode(NEWLINES2, $result);
}
