<?php
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button' : '.sv100_sv_content_wrapper article .wp-block-button',
		array_merge(
			$script->get_parent()->get_setting('margin')->get_css_data(),
			$script->get_parent()->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button > .wp-block-button__link' : '.sv100_sv_content_wrapper article .wp-block-button > .wp-block-button__link',
		array_merge(
			$script->get_parent()->get_setting('font')->get_css_data('font-family'),
			$script->get_parent()->get_setting('font_size')->get_css_data('font-size','','px'),
			$script->get_parent()->get_setting('line_height')->get_css_data('line-height'),
			$script->get_parent()->get_setting('text_color')->get_css_data(),
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color'),
			$script->get_parent()->get_setting('padding')->get_css_data('padding')
		)
	);