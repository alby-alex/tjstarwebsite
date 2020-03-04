<?php //netteCache[01]000472a:2:{s:4:"time";s:21:"0.40839200 1428247375";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:83:"/afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/index.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/index.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'rqecvhtjut')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1046845d18_content')) { function _lb1046845d18_content($_l, $_args) { extract($_args)
?>

<section class="section content-section blog-section">

<div id="container" class="subpage wrapper <?php if(is_active_sidebar("blog-sidebar")): else: ?>
onecolumn<?php endif ?>">

<?php if ($posts): ?>
	<div id="content" class="entry-content clearfix" role="main">
		<div class="content-wrapper clearfix">

<?php if (!$isIndexPage): if (trim($post->content) != ""): ?>

			<header class="entry-title clearfix">
				<h1><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>
				<span class="breadcrumbs"><?php echo NTemplateHelpers::escapeHtml(__('You are here:', 'ait'), ENT_NOQUOTES) ?>
 <?php echo WpLatteFunctions::breadcrumbs(array()) ?></span>
			</header>

			<div class="post-content">
				<?php echo $post->content ?>

			</div>

<?php endif ;endif ?>


<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['rqecvhtjut'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['rqecvhtjut'])->render() ?>

<?php NCoreMacros::includeTemplate("snippets/content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['rqecvhtjut'])->render() ?>


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

<?php NCoreMacros::includeTemplate("snippets/nothing-found.php", $template->getParams(), $_l->templates['rqecvhtjut'])->render() ?>

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
$_l->extends = $layout ;if (!$isIndexPage): $sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->sectionsOrder : null ;endif ?>


<?php if (!$isIndexPage): isset($post->options('countdown')->overrideGlobal) ? $sectionA = 'sectionA' : $sectionA = 'xa' ;//
// block $sectionA
//
if (!function_exists($_l->blocks[$sectionA][] = '_lbb1e108b22b__sectionA')) { function _lbb1e108b22b__sectionA($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippets/countdown.php", array('options' => $post->options('countdown')) + $template->getParams(), $_l->templates['rqecvhtjut'])->render() ;}} call_user_func(reset($_l->blocks[$sectionA]), $_l, get_defined_vars()) ?>

<?php isset($post->options('static-text')->overrideGlobal) ? $sectionB = 'sectionB' : $sectionB = 'xb' ;//
// block $sectionB
//
if (!function_exists($_l->blocks[$sectionB][] = '_lb8b9a5b98f1__sectionB')) { function _lb8b9a5b98f1__sectionB($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippets/static-text.php", array('options' => $post->options('static-text')) + $template->getParams(), $_l->templates['rqecvhtjut'])->render() ;}} call_user_func(reset($_l->blocks[$sectionB]), $_l, get_defined_vars()) ;endif ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
