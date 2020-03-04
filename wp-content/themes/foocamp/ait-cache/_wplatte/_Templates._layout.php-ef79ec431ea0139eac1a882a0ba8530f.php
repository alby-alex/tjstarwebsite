<?php //netteCache[01]000466a:2:{s:4:"time";s:21:"0.70262400 1494609875";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:77:"/web/activities/tjstar/public/wp-content/themes/foocamp/Templates/@layout.php";i:2;i:1477681557;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /web/activities/tjstar/public/wp-content/themes/foocamp/Templates/@layout.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'v9z1q83q3f')
;//
// block sectionA
//
if (!function_exists($_l->blocks['sectionA'][] = '_lbf6645dcb90_sectionA')) { function _lbf6645dcb90_sectionA($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippets/countdown.php", array('options' => $themeOptions->sections) + $template->getParams(), $_l->templates['v9z1q83q3f'])->render() ;
}}

//
// block sectionB
//
if (!function_exists($_l->blocks['sectionB'][] = '_lb5856377015_sectionB')) { function _lb5856377015_sectionB($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippets/static-text.php", array('options' => $themeOptions->sections) + $template->getParams(), $_l->templates['v9z1q83q3f'])->render() ;
}}

//
// block sectionC
//
if (!function_exists($_l->blocks['sectionC'][] = '_lbaac711ea1d_sectionC')) { function _lbaac711ea1d_sectionC($_l, $_args) { extract($_args)
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
