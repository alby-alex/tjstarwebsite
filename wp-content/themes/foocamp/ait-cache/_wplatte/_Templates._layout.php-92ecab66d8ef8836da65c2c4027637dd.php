<?php //netteCache[01]000474a:2:{s:4:"time";s:21:"0.35356100 1417885851";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:85:"/afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/@layout.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/@layout.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '8e91qtkb4b')
;//
// block sectionA
//
if (!function_exists($_l->blocks['sectionA'][] = '_lb8e69adea7f_sectionA')) { function _lb8e69adea7f_sectionA($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippets/countdown.php", array('options' => $themeOptions->sections) + $template->getParams(), $_l->templates['8e91qtkb4b'])->render() ;
}}

//
// block sectionB
//
if (!function_exists($_l->blocks['sectionB'][] = '_lbfec3796df4_sectionB')) { function _lbfec3796df4_sectionB($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippets/static-text.php", array('options' => $themeOptions->sections) + $template->getParams(), $_l->templates['8e91qtkb4b'])->render() ;
}}

//
// block sectionC
//
if (!function_exists($_l->blocks['sectionC'][] = '_lb567cf670b2_sectionC')) { function _lb567cf670b2_sectionC($_l, $_args) { extract($_args)
;NUIMacros::callBlock($_l, 'content', $template->getParams()) ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extends) ? FALSE : $template->_extends; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
get_header("") ?>

<div id="sections">
	


    
	<?php if (!isset($sectionsOrder)): ?> <?php $sectionsOrder = $themeOptions->sections->sectionsOrder ?>
 <?php endif ?>


<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($sectionsOrder) as $section): NUIMacros::callBlock($_l, $section, $template->getParams()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	
</div>

<?php get_footer("") ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
