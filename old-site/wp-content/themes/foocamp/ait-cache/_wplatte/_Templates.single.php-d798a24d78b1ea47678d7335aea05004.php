<?php //netteCache[01]000491a:2:{s:4:"time";s:21:"0.18613300 1416529564";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:101:"/afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/single.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/single.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'ys9ajiiv3n')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7800df3559_content')) { function _lb7800df3559_content($_l, $_args) { extract($_args)
?>
<section class="section content-section single-post-section">

<div id="container" class="subpage wrapper <?php if(is_active_sidebar("post-sidebar")): else: ?>
onecolumn<?php endif ?>">

	<div id="content" class="entry-content clearfix" role="main">
		<div class="content-wrapper clearfix">

			<article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?> in-loop clearfix">

<?php NCoreMacros::includeTemplate("snippets/posted-on.php", $template->getParams(), $_l->templates['ys9ajiiv3n'])->render() ?>

<?php if ($post->thumbnailSrc != false): ?>
				<a href="<?php echo htmlSpecialChars($post->thumbnailSrc) ?>">
				<div class="entry-thumbnail">
<?php $imgWidth = 980 ?>
					<?php if(is_active_sidebar("post-sidebar")): ?> <?php $imgWidth = 650 ?> <?php endif ?>

					<img src="<?php echo AitImageResizer::resize($post->thumbnailSrc, array('w' => $imgWidth, 'h' => 400)) ?>" class="block" alt="" />
				</div>
				</a>
<?php endif ?>


				<div class="post-content entry-content">
					<?php echo $post->content ?>

				</div>

				<div class="entry-meta post-footer clearfix">
					<a href="<?php echo WpLatteFunctions::getDayLink($post->date) ?>" class="date meta-info" title="<?php echo htmlSpecialChars($template->date($post->date, $site->dateFormat)) ?>
" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "F d, Y"), ENT_NOQUOTES) ?></a>
					<a class="url fn n ln author meta-info" href="<?php echo htmlSpecialChars($post->author->postsUrl) ?>
" title="View all posts by <?php echo htmlSpecialChars($post->author->name) ?>" rel="author"><?php echo NTemplateHelpers::escapeHtml($post->author->name, ENT_NOQUOTES) ?></a>
<?php if ($post->type == 'post' && $post->categories): ?>
					<span class="categories meta-info"><?php echo $post->categories ?></span>
<?php endif ;if ($post->tags): ?>
					<span class="tags meta-info"><?php echo $post->tags ?></span>
<?php endif ?>
					<span class="comments meta-info"><?php echo NTemplateHelpers::escapeHtml($post->commentsCount, ENT_NOQUOTES) ?></span>
				</div><!-- /.entry-meta -->

<?php if (strlen($post->author->bio) !== 0): ?>
				<div class="author-archive-meta clearfix">
					<div id="author-avatar" class="left"><?php echo $post->author->avatar(60) ?></div>
					<div id="author-description" class="clearfix">
						<div class="author-name"><?php echo NTemplateHelpers::escapeHtml(_x('', 'about author', 'ait'), ENT_NOQUOTES) ?>
 <?php echo NTemplateHelpers::escapeHtml($post->author->name, ENT_NOQUOTES) ?></div>
						<div class="bio"><?php echo $post->author->bio ?></div>
					</div>
				</div>
<?php endif ?>

			</article>

<?php NCoreMacros::includeTemplate("comments.php", array('closeable' => $themeOptions->general->closeComments, 'defaultState' => $themeOptions->general->defaultPosition) + $template->getParams(), $_l->templates['ys9ajiiv3n'])->render() ?>

		</div><!-- /.content-wrapper -->
	</div> <!-- /#content -->

<?php if(is_active_sidebar("post-sidebar")): ?>
	<div class="page-sidebar post-sidebar right clearfix">
<?php dynamic_sidebar('post-sidebar') ?>
	</div>
<?php endif ?>

</div ><!-- /#container -->

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
$_l->extends = $layout ;$sectionsOrder = isset($post->options('sections-order')->overrideGlobal) ? $post->options('sections-order')->sectionsOrder : null ?>


<?php isset($post->options('countdown')->overrideGlobal) ? $sectionA = 'sectionA' : $sectionA = 'xa' ;//
// block $sectionA
//
if (!function_exists($_l->blocks[$sectionA][] = '_lbfcf5a18817__sectionA')) { function _lbfcf5a18817__sectionA($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippets/countdown.php", array('options' => $post->options('countdown')) + $template->getParams(), $_l->templates['ys9ajiiv3n'])->render() ;}} call_user_func(reset($_l->blocks[$sectionA]), $_l, get_defined_vars()) ?>

<?php isset($post->options('static-text')->overrideGlobal) ? $sectionB = 'sectionB' : $sectionB = 'xb' ;//
// block $sectionB
//
if (!function_exists($_l->blocks[$sectionB][] = '_lb491ca6d1b8__sectionB')) { function _lb491ca6d1b8__sectionB($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippets/static-text.php", array('options' => $post->options('static-text')) + $template->getParams(), $_l->templates['ys9ajiiv3n'])->render() ;}} call_user_func(reset($_l->blocks[$sectionB]), $_l, get_defined_vars()) ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
