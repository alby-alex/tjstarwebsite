<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<input type="text" class="field" name="s" id="s"  value="<?php _e('Search this site...', 'themejunkie') ?>" onfocus="if (this.value == '<?php _e('Search this site...', 'themejunkie') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search this site...', 'themejunkie') ?>';}" />
</form>