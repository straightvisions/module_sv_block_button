<?php
	/*
	 * not outline
	 * not hover
	 * not active
	 * not text color
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(:hover):not(:active):not(.has-text-color)' :
			'.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(:hover):not(:active):not(.has-text-color)',
		array_merge(
			$module->get_setting('text_color')->get_css_data('color')
		)
	);

	/*
	 * not outline
	 * not hover
	 * not background
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(:hover):not(:active):not(.has-background)' :
			'.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(:hover):not(:active):not(.has-background)',
		array_merge(
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	/*
	 * not outline
	 * has hover
	 * has active
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover, .editor-styles-wrapper .wp-block-button:not(.is-style-outline) .wp-block-button__link:active' :
			'.wp-block-button:not(.is-style-outline) .wp-block-button__link:hover, .wp-block-button:not(.is-style-outline) .wp-block-button__link:active',
		array_merge(
			$module->get_setting('text_color')->get_css_data('background-color'),
			$module->get_setting('bg_color')->get_css_data('color')
		)
	);

	// Spacing & Border
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button' : '.wp-block-button',
		array_merge(
			$module->get_setting('margin')->get_css_data()
		)
	);
	
	// Default: Sizing
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-buttons .wp-block-button > .wp-block-button__link' : '.wp-block-buttons .wp-block-button > .wp-block-button__link',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('border')->get_css_data()
		)
	);

	if($module->get_module('sv_colors')){
		$colors		= $module->get_module('sv_colors')->get_list();

		foreach($colors as $color){
			echo is_admin()
				? '.editor-styles-wrapper .wp-block-button:not(.is-style-outline) > .wp-block-button__link.has-'.$color['slug'].'-background-color{'
				: '.wp-block-button:not(.is-style-outline) > .wp-block-button__link.has-'.$color['slug'].'-background-color{'
			;

			echo 'border-color:rgba('.$color['color'].');';

			echo '}';
		}

		foreach($colors as $color){
			echo is_admin()
				? '.editor-styles-wrapper .wp-block-button.is-style-outline > .wp-block-button__link.has-'.$color['slug'].'-color{'
				: '.wp-block-button.is-style-outline > .wp-block-button__link.has-'.$color['slug'].'-color{'
			;

			echo 'border-color:rgba('.$color['color'].');';

			echo '}';
		}
	}