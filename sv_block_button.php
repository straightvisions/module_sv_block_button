<?php
	namespace sv100;

	class sv_block_button extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Button', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" fill-rule="evenodd" clip-rule="evenodd"><path serif:id="shape 4" d="M22 0c1.104 0 2 .896 2 2v20c0 1.104-.896 2-2 2h-20c-1.104 0-2-.896-2-2v-20c0-1.104.896-2 2-2h20zm0 2.75c0-.413-.335-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75v18.5c0 .415.337.75.75.75h18.5c.414 0 .75-.336.75-.75v-18.5z"/></svg>')
				->set_block_handle('wp-block-button')
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_block_button {
			$this->get_setting( 'font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_default_value( 18 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '255,255,255,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '30,30,30,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'outline_text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '255,255,255,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'outline_bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '30,30,30,1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'margin' )
				->set_title( __( 'Margin', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'margin' );

			$this->get_setting( 'padding' )
				->set_title( __( 'Padding', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'margin' );

			$this->get_setting( 'border' )
				->set_title( __( 'Border', 'sv100' ) )
				->set_is_responsive(true)
				->set_default_value(
					array(
						'top_width'					=> '1px',
						'right_width'				=> '1px',
						'bottom_width'				=> '1px',
						'left_width'				=> '1px',
						'top_style'					=> 'solid',
						'right_style'				=> 'solid',
						'bottom_style'				=> 'solid',
						'left_style'				=> 'solid',
						'top_right_radius'			=> 0,
						'bottom_right_radius'		=> 0,
						'bottom_left_radius'		=> 0,
						'top_left_radius'			=> 0,
						'color'						=> '30,30,30,1'
					)
				)
				->load_type( 'border' );

			return $this;
		}

		protected function register_scripts(): sv_block_button {
			parent::register_scripts();

			$this->get_script( 'style_shadow_1' )
				->set_is_gutenberg()
				->set_path( 'lib/css/common/style_shadow_1.css' );

			$this->get_script( 'style_no_border' )
				->set_is_gutenberg()
				->set_path( 'lib/css/common/style_no_border.css' );

			$this->get_script( 'style_no_horizontal_padding' )
				->set_is_gutenberg()
				->set_path( 'lib/css/common/style_no_horizontal_padding.css' );

			return $this;
		}
		public function enqueue_scripts(): sv_block_button {
			if(!$this->has_block_frontend('button')){
				return $this;
			}

			if(!is_admin()){
				$this->load_settings()->register_scripts();
			}

			foreach($this->get_scripts() as $script){
				$script->set_is_enqueued();
			}

			return $this;
		}
	}