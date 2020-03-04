<?php //netteCache[01]000470a:2:{s:4:"time";s:21:"0.69614600 1427648978";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:81:"/afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/404.php";i:2;i:1416516409;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:21:"WPLATTE_CACHE_VERSION";i:2;i:4;}}}?><?php

// source file: /afs/csl.tjhsst.edu/web/academics/srs/wp-content/themes/foocamp/Templates/404.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'ckt2e02lqu')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6d4670bd0d_content')) { function _lb6d4670bd0d_content($_l, $_args) { extract($_args)
?>

<section class="section content-section blog-section not-found-section">

	<div id="container" class="subpage blog 404 wrapper <?php if(is_active_sidebar("blog-sidebar")): else: ?>
onecolumn<?php endif ?>">

		<div id="content" class="entry-content clearfix" role="main">
			<div class="content-wrapper">
<?php NCoreMacros::includeTemplate("snippets/nothing-found.php", $template->getParams(), $_l->templates['ckt2e02lqu'])->render() ?>
			</div> <!-- /.content-wrapper -->
		</div> <!-- /#content -->

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
