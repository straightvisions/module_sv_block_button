<?php
	/* Default: Spacing & Border */
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button' : '.sv100_sv_content_wrapper article .wp-block-button',
		array_merge(
			$module->get_setting('margin')->get_css_data()
		)
	);
	
	/* Default: Sizing */
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button > .wp-block-button__link' : '.sv100_sv_content_wrapper article .wp-block-button > .wp-block-button__link',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('border')->get_css_data()
		)
	);
	
	/* Filled: Text Color */
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button:not(.is-style-outline) > .wp-block-button__link:not(.has-text-color)' : '.sv100_sv_content_wrapper article .wp-block-button:not(.is-style-outline) > .wp-block-button__link:not(.has-text-color)',
		array_merge(
			$module->get_setting('text_color')->get_css_data()
		)
	);
	
	/* Filled: Background Color */
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button:not(.is-style-outline) > .wp-block-button__link:not(.has-background)' : '.sv100_sv_content_wrapper article .wp-block-button:not(.is-style-outline) > .wp-block-button__link:not(.has-background)',
		array_merge(
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);
	
	/* Outline: Text Color */
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color)' : '.sv100_sv_content_wrapper article .wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color)',
		array_merge(
			$module->get_setting('text_color')->get_css_data(),
			$module->get_setting('text_color')->get_css_data('border-color')
		)
	);