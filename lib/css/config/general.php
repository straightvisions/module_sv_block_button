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
			'.sv100_sv_content_wrapper article .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(:hover):not(:active):not(.has-text-color)',
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
			'.sv100_sv_content_wrapper article .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(:hover):not(:active):not(.has-background)',
		array_merge(
			$module->get_setting('bg_color')->get_css_data('background-color')
		)
	);

	/*
	 * has outline
	 * not hover
	 * not active
	 * not text color
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:not(:hover):not(:active):not(.has-text-color)' :
			'.sv100_sv_content_wrapper article .wp-block-button.is-style-outline .wp-block-button__link:not(:hover):not(:active):not(.has-text-color)',
		array_merge(
			$module->get_setting('text_color')->get_css_data('color')
		)
	);

	/*
	 * has outline
	 * has hover
	 * has active
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover, .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:active' :
			'.sv100_sv_content_wrapper article .wp-block-button.is-style-outline .wp-block-button__link:hover, .sv100_sv_content_wrapper article .wp-block-button.is-style-outline .wp-block-button__link:active',
		array_merge(
			$module->get_setting('text_color')->get_css_data('background-color'),
			$module->get_setting('bg_color')->get_css_data('color')
		)
	);

	/*
	 * has background
	 * has outline
	 * has hover
	 * has active
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .has-background .wp-block-button.is-style-outline .wp-block-button__link:hover, .editor-styles-wrapper .has-background .wp-block-button.is-style-outline .wp-block-button__link:active' :
			'.sv100_sv_content_wrapper article .has-background .wp-block-button.is-style-outline .wp-block-button__link:hover, .sv100_sv_content_wrapper article .has-background .wp-block-button.is-style-outline .wp-block-button__link:active',
		array_merge(
			$module->get_setting('text_color')->get_css_data('color')
		)
	);

	/*
	 * has color
	 * has outline
	 * has hover
	 * has active
	 */

	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .has-text-color .wp-block-button.is-style-outline .wp-block-button__link:hover, .editor-styles-wrapper .has-text-color .wp-block-button.is-style-outline .wp-block-button__link:active' :
			'.sv100_sv_content_wrapper article .has-text-color .wp-block-button.is-style-outline .wp-block-button__link:hover, .sv100_sv_content_wrapper article .has-text-color .wp-block-button.is-style-outline .wp-block-button__link:active',
		array_merge(
			$module->get_setting('bg_color')->get_css_data('color')
		)
	);

	/*
	 * has color
	 * has outline
	 * has radius
	 * has focus
	 */
	echo $_s->build_css(
		is_admin() ?
			'.editor-styles-wrapper .is-style-outline .wp-block-button__link[style*=radius]:focus, .editor-styles-wrapper .wp-block-button a.wp-block-button__link[style*=radius]:focus' :
			'.sv100_sv_content_wrapper article .is-style-outline .wp-block-button__link[style*=radius]:focus, .sv100_sv_content_wrapper article .editor-styles-wrapper .wp-block-button a.wp-block-button__link[style*=radius]:focus',
		array_merge(
			$module->get_setting('bg_color')->get_css_data('outline-color')
		)
	);

	// Spacing & Border
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-button' : '.sv100_sv_content_wrapper article .wp-block-button',
		array_merge(
			$module->get_setting('margin')->get_css_data()
		)
	);
	
	// Default: Sizing
	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .wp-block-buttons .wp-block-button > .wp-block-button__link' : '.sv100_sv_content_wrapper article .wp-block-buttons .wp-block-button > .wp-block-button__link',
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
				: '.sv100_sv_content_wrapper article .wp-block-button:not(.is-style-outline) > .wp-block-button__link.has-'.$color['slug'].'-background-color{'
			;

			echo 'border-color:rgba('.$color['color'].');';

			echo '}';
		}

		foreach($colors as $color){
			echo is_admin()
				? '.editor-styles-wrapper .wp-block-button.is-style-outline > .wp-block-button__link.has-'.$color['slug'].'-color{'
				: '.sv100_sv_content_wrapper article .wp-block-button.is-style-outline > .wp-block-button__link.has-'.$color['slug'].'-color{'
			;

			echo 'border-color:rgba('.$color['color'].');';

			echo '}';
		}
	}