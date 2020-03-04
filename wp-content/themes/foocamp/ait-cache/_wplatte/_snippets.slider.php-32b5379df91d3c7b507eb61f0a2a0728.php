<?php //netteCache[01]000500a:2:{s:4:"time";s:21:"0.09093000 1416516419";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:110:"/afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/snippets/slider.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/www/students/activities/tjstar/wp-content/themes/foocamp/Templates/snippets/slider.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '5i1hb8imtd')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if ($options->sliderEnable == 1): if ($options->sliderAliases != 'null'): if (isset($options->sliderAlternativeMobile) && $options->sliderAlternativeMobile != ''): ?>
		<div class="slider-alternative mobile" style="display: none">
			<img src="<?php echo htmlSpecialChars($options->sliderAlternativeMobile) ?>" alt="alternative" />
		</div>
<?php endif ;if (isset($options->sliderAlternativeTablet) && $options->sliderAlternativeTablet != ''): ?>
		<div class="slider-alternative tablet" style="display: none">
			<img src="<?php echo htmlSpecialChars($options->sliderAlternativeTablet) ?>" alt="alternative" />
		</div>
<?php endif ;if (function_exists('putRevSlider')): ?>
			<?php echo NTemplateHelpers::escapeHtml(putRevSlider($options->sliderAliases), ENT_NOQUOTES) ?>

<?php endif ;endif ;endif ;
