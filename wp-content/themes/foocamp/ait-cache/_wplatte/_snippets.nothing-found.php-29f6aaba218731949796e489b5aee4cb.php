<?php //netteCache[01]000507a:2:{s:4:"time";s:21:"0.92184800 1416532946";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:117:"/afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/snippets/nothing-found.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/snippets/nothing-found.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'tkjmlmx0a1')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<article id="post-0" class="post no-results not-found">
	<header class="entry-title entry-header">
		<h1 class="page-title 404"><?php echo NTemplateHelpers::escapeHtml(__('Nothing Found', 'ait'), ENT_NOQUOTES) ?></h1>
		<span class="breadcrumbs"><?php echo NTemplateHelpers::escapeHtml(__('You are here:', 'ait'), ENT_NOQUOTES) ?>
 <?php echo WpLatteFunctions::breadcrumbs(array()) ?></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p><?php echo NTemplateHelpers::escapeHtml(__('Apologies, but no results were found for the request. Perhaps searching will help find a related post.', 'ait'), ENT_NOQUOTES) ?></p>
<?php NCoreMacros::includeTemplate("search-form.php", $template->getParams(), $_l->templates['tkjmlmx0a1'])->render() ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->