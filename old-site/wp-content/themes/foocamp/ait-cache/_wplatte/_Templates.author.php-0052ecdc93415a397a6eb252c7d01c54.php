<?php //netteCache[01]000473a:2:{s:4:"time";s:21:"0.91076900 1427821030";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:84:"/afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/author.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/author.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'gu6i6imxcz')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbbfc6cb4d9d_content')) { function _lbbfc6cb4d9d_content($_l, $_args) { extract($_args)
?>

<section class="section content-section blog-section author-section">

<div id="container" class="subpage blog author wrapper <?php if(is_active_sidebar("blog-sidebar")): else: ?>
onecolumn<?php endif ?>">

<?php if ($posts): ?>

	<div id="content" class="entry-content clearfix" role="main">
		<div class="content-wrapper">
			<header class="entry-title subpage-header">
	            <h1 class="page-title author">
	                <?php echo NTemplateHelpers::escapeHtml(__('Author Archives:', 'ait'), ENT_NOQUOTES) ?>

	                <span class="vcard">
	                    <a class="url fn n" href="<?php echo htmlSpecialChars($author->postsUrl) ?>
" title="<?php echo htmlSpecialChars($author->name) ?>" rel="me"><?php echo NTemplateHelpers::escapeHtml($author->name, ENT_NOQUOTES) ?></a>
	                </span>
	            </h1>
				<span class="breadcrumbs"><?php echo NTemplateHelpers::escapeHtml(__('You are here:', 'ait'), ENT_NOQUOTES) ?>
 <?php echo WpLatteFunctions::breadcrumbs(array()) ?></span>
			</header>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['gu6i6imxcz'])->render() ?>

<?php if (strlen($author->bio) !== 0): ?>
			<div class="author-archive-meta clearfix">
				<div id="author-avatar" class="left"><?php echo $author->avatar(60) ?></div>
				<div id="author-description" class="clearfix">
					<div class="author-name"><?php echo NTemplateHelpers::escapeHtml(_x('About', 'about author', 'ait'), ENT_NOQUOTES) ?>
 <?php echo NTemplateHelpers::escapeHtml($author->name, ENT_NOQUOTES) ?></div>
					<div class="bio"><?php echo NTemplateHelpers::escapeHtml($author->bio, ENT_NOQUOTES) ?></div>
				</div>
			</div>
<?php endif ?>

<?php NCoreMacros::includeTemplate("snippets/content-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['gu6i6imxcz'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['gu6i6imxcz'])->render() ?>

		</div> <!-- /.content-wrapper -->
	</div> <!-- /#content -->

<?php if(is_active_sidebar("blog-sidebar")): ?>
	<div class="page-sidebar blog-sidebar right clearfix">
<?php dynamic_sidebar('blog-sidebar') ?>
	</div>
<?php endif ?>

<?php else: ?>

	<div id="content" class="entry-content" role="main">
		<div class="content-wrapper">

<?php NCoreMacros::includeTemplate("snippets/nothing-found.php", $template->getParams(), $_l->templates['gu6i6imxcz'])->render() ?>

		</div> <!-- /.content-wrapper -->
	</div> <!-- /#content -->

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
