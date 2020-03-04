<?php //netteCache[01]000487a:2:{s:4:"time";s:21:"0.84699900 1427648978";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/snippets/search-form.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/snippets/search-form.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'yv5rn1we46')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<form action="<?php echo htmlSpecialChars($homeUrl) ?>" id="search-form" method="get" class="searchform">
	<div>

		<input type="submit" name="submit"  value="<?php echo htmlSpecialChars(__('Search', 'ait')) ?>" class="searchsubmit" />
		<input type="text" name="s" placeholder="<?php echo htmlSpecialChars(__('search...', 'ait')) ?>" class="searchinput" />

	</div>
</form>

