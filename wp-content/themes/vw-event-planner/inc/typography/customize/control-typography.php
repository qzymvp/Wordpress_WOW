<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Event_Planner_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-event-planner' ),
				'family'      => esc_html__( 'Font Family', 'vw-event-planner' ),
				'size'        => esc_html__( 'Font Size',   'vw-event-planner' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-event-planner' ),
				'style'       => esc_html__( 'Font Style',  'vw-event-planner' ),
				'line_height' => esc_html__( 'Line Height', 'vw-event-planner' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-event-planner' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-event-planner-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-event-planner-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-event-planner' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-event-planner' ),
        'Acme' => __( 'Acme', 'vw-event-planner' ),
        'Anton' => __( 'Anton', 'vw-event-planner' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-event-planner' ),
        'Arimo' => __( 'Arimo', 'vw-event-planner' ),
        'Arsenal' => __( 'Arsenal', 'vw-event-planner' ),
        'Arvo' => __( 'Arvo', 'vw-event-planner' ),
        'Alegreya' => __( 'Alegreya', 'vw-event-planner' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-event-planner' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-event-planner' ),
        'Bangers' => __( 'Bangers', 'vw-event-planner' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-event-planner' ),
        'Bad Script' => __( 'Bad Script', 'vw-event-planner' ),
        'Bitter' => __( 'Bitter', 'vw-event-planner' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-event-planner' ),
        'BenchNine' => __( 'BenchNine', 'vw-event-planner' ),
        'Cabin' => __( 'Cabin', 'vw-event-planner' ),
        'Cardo' => __( 'Cardo', 'vw-event-planner' ),
        'Courgette' => __( 'Courgette', 'vw-event-planner' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-event-planner' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-event-planner' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-event-planner' ),
        'Cuprum' => __( 'Cuprum', 'vw-event-planner' ),
        'Cookie' => __( 'Cookie', 'vw-event-planner' ),
        'Chewy' => __( 'Chewy', 'vw-event-planner' ),
        'Days One' => __( 'Days One', 'vw-event-planner' ),
        'Dosis' => __( 'Dosis', 'vw-event-planner' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-event-planner' ),
        'Economica' => __( 'Economica', 'vw-event-planner' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-event-planner' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-event-planner' ),
        'Francois One' => __( 'Francois One', 'vw-event-planner' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-event-planner' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-event-planner' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-event-planner' ),
        'Handlee' => __( 'Handlee', 'vw-event-planner' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-event-planner' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-event-planner' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-event-planner' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-event-planner' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-event-planner' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-event-planner' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-event-planner' ),
        'Kanit' => __( 'Kanit', 'vw-event-planner' ),
        'Lobster' => __( 'Lobster', 'vw-event-planner' ),
        'Lato' => __( 'Lato', 'vw-event-planner' ),
        'Lora' => __( 'Lora', 'vw-event-planner' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-event-planner' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-event-planner' ),
        'Merriweather' => __( 'Merriweather', 'vw-event-planner' ),
        'Monda' => __( 'Monda', 'vw-event-planner' ),
        'Montserrat' => __( 'Montserrat', 'vw-event-planner' ),
        'Muli' => __( 'Muli', 'vw-event-planner' ),
        'Marck Script' => __( 'Marck Script', 'vw-event-planner' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-event-planner' ),
        'Open Sans' => __( 'Open Sans', 'vw-event-planner' ),
        'Overpass' => __( 'Overpass', 'vw-event-planner' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-event-planner' ),
        'Oxygen' => __( 'Oxygen', 'vw-event-planner' ),
        'Orbitron' => __( 'Orbitron', 'vw-event-planner' ),
        'Patua One' => __( 'Patua One', 'vw-event-planner' ),
        'Pacifico' => __( 'Pacifico', 'vw-event-planner' ),
        'Padauk' => __( 'Padauk', 'vw-event-planner' ),
        'Playball' => __( 'Playball', 'vw-event-planner' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-event-planner' ),
        'PT Sans' => __( 'PT Sans', 'vw-event-planner' ),
        'Philosopher' => __( 'Philosopher', 'vw-event-planner' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-event-planner' ),
        'Poiret One' => __( 'Poiret One', 'vw-event-planner' ),
        'Quicksand' => __( 'Quicksand', 'vw-event-planner' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-event-planner' ),
        'Raleway' => __( 'Raleway', 'vw-event-planner' ),
        'Rubik' => __( 'Rubik', 'vw-event-planner' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-event-planner' ),
        'Russo One' => __( 'Russo One', 'vw-event-planner' ),
        'Righteous' => __( 'Righteous', 'vw-event-planner' ),
        'Slabo' => __( 'Slabo', 'vw-event-planner' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-event-planner' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-event-planner'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-event-planner' ),
        'Sacramento' => __( 'Sacramento', 'vw-event-planner' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-event-planner' ),
        'Tangerine' => __( 'Tangerine', 'vw-event-planner' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-event-planner' ),
        'VT323' => __( 'VT323', 'vw-event-planner' ),
        'Varela Round' => __( 'Varela Round', 'vw-event-planner' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-event-planner' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-event-planner' ),
        'Volkhov' => __( 'Volkhov', 'vw-event-planner' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-event-planner' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-event-planner' ),
			'100' => esc_html__( 'Thin',       'vw-event-planner' ),
			'300' => esc_html__( 'Light',      'vw-event-planner' ),
			'400' => esc_html__( 'Normal',     'vw-event-planner' ),
			'500' => esc_html__( 'Medium',     'vw-event-planner' ),
			'700' => esc_html__( 'Bold',       'vw-event-planner' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-event-planner' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-event-planner' ),
			'italic'  => esc_html__( 'Italic', 'vw-event-planner' ),
			'oblique' => esc_html__( 'Oblique', 'vw-event-planner' )
		);
	}
}
