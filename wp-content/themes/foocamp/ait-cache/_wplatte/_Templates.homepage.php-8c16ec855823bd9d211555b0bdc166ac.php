<?php //netteCache[01]000493a:2:{s:4:"time";s:21:"0.53979300 1425134229";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:103:"/afs/csl.tjhsst.edu/web/oldsite/studentlife/events/srs/wp-content/themes/foocamp/Templates/homepage.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/oldsite/studentlife/events/srs/wp-content/themes/foocamp/Templates/homepage.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '84373kf1k7')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbdfb7b35233_content')) { function _lbdfb7b35233_content($_l, $_args) { extract($_args)
?>

<?php if (trim($post->content) != ""): ?>

<section class="section content-section">

<div id="container" class="homepage subpage wrapper <?php if(is_active_sidebar("homepage-sidebar")): else: ?>
onecolumn<?php endif ?>">

	<div id="content" class="entry-content clearfix" role="main">
		<div class="content-wrapper clearfix">

			<div class="post-content">
				<?php echo $post->content ?>

			</div>

		</div> <!-- /.content-wrapper -->

<?php NCoreMacros::includeTemplate("comments.php", array('closeable' => $themeOptions->general->closeComments, 'defaultState' => $themeOptions->general->defaultPosition) + $template->getParams(), $_l->templates['84373kf1k7'])->render() ?>

	</div> <!-- /#content -->

<?php if(is_active_sidebar("homepage-sidebar")): ?>
	<div class="page-sidebar homepage-sidebar right clearfix">
<?php dynamic_sidebar('homepage-sidebar') ?>
	</div>
<?php endif ?>

</div> <!-- /#container -->

</section>

<?php endif ?>

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
if (!function_exists($_l->blocks[$sectionA][] = '_lb324f35a4ec__sectionA')) { function _lb324f35a4ec__sectionA($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippets/countdown.php", array('options' => $post->options('countdown')) + $template->getParams(), $_l->templates['84373kf1k7'])->render() ;}} call_user_func(reset($_l->blocks[$sectionA]), $_l, get_defined_vars()) ?>

<?php isset($post->options('static-text')->overrideGlobal) ? $sectionB = 'sectionB' : $sectionB = 'xb' ;//
// block $sectionB
//
if (!function_exists($_l->blocks[$sectionB][] = '_lbc4b7277a84__sectionB')) { function _lbc4b7277a84__sectionB($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippets/static-text.php", array('options' => $post->options('static-text')) + $template->getParams(), $_l->templates['84373kf1k7'])->render() ;}} call_user_func(reset($_l->blocks[$sectionB]), $_l, get_defined_vars()) ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
