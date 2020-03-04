<?php //netteCache[01]000487a:2:{s:4:"time";s:21:"0.97184300 1417930537";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/tag.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/tag.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'njdb1e3m6g')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1dd476fcc6_content')) { function _lb1dd476fcc6_content($_l, $_args) { extract($_args)
?>

<section class="section content-section blog-section tag-section">

<div id="container" class="subpage blog tag wrapper <?php if(is_active_sidebar("blog-sidebar")): else: ?>
onecolumn<?php endif ?>">

	<div id="content" class="entry-content clearfixs" role="main">
		<div class="content-wrapper">

<?php if ($posts): ?>
				<header class="entry-title subpage-header">
					<h1 class="page-title">
						<?php echo NTemplateHelpers::escapeHtml(__('Tag Archives:', 'ait'), ENT_NOQUOTES) ?>
 <span><?php echo NTemplateHelpers::escapeHtml($tag->title, ENT_NOQUOTES) ?></span>
					</h1>
					<span class="breadcrumbs"><?php echo NTemplateHelpers::escapeHtml(__('You are here:', 'ait'), ENT_NOQUOTES) ?>
 <?php echo WpLatteFunctions::breadcrumbs(array()) ?></span>
				</header>

<?php if (!empty($tag->description)): ?>
					<div class="category-archive-meta"><?php echo $tag->description ?></div>
<?php endif ?>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['njdb1e3m6g'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['njdb1e3m6g'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['njdb1e3m6g'])->render() ?>

<?php else: ?>

<?php NCoreMacros::includeTemplate("snippets/nothing-found.php", $template->getParams(), $_l->templates['njdb1e3m6g'])->render() ?>

<?php endif ?>

		</div> <!-- /.content-wrapper -->
	</div> <!-- /#content -->

<?php if(is_active_sidebar("blog-sidebar")): ?>
	<div class="page-sidebar blog-sidebar right clearfix">
<?php dynamic_sidebar('blog-sidebar') ?>
	</div>
<?php endif ?>

</div> <!-- /#container -->

</section>

<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = true; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
$_l->extends = $layout ?>

<?php 
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
