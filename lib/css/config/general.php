<?php
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button' : '.sv100_sv_content_wrapper article .wp-block-button',
		array_merge(
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button > .wp-block-button__link' : '.sv100_sv_content_wrapper article .wp-block-button > .wp-block-button__link',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('padding')->get_css_data('padding')
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button:not(.is-style-outline) > .wp-block-button__link' : '.sv100_sv_content_wrapper article .wp-block-button:not(.is-style-outline) > .wp-block-button__link',
		array_merge(
			$module->get_setting('text_color')->get_css_data(),
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button.is-style-outline > .wp-block-button__link' : '.sv100_sv_content_wrapper article .wp-block-button.is-style-outline > .wp-block-button__link',
		array_merge(
			$module->get_setting('text_color')->get_css_data('background-color'),
			$module->get_setting('bg_color')->get_css_data('color')
		)
	);