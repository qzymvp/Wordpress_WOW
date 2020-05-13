<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class event_planners_Example_1_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function event_planners_get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->event_planners_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function event_planners_setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'event_planners_sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'event_planners_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function event_planners_sections( $manager ) {

		// Load custom sections.
		get_template_part( 'customize-pro/example-1/section', 'pro' );

		// Register custom section types.
		$manager->register_section_type( 'event_planners_Example_1_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new event_planners_Example_1_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'event-planners' ),
					'pro_text' => esc_html__( 'Upgrade Now', 'event-planners' ),
					'pro_url'  => EVENT_PLANNERS_SKTTHEMES_PRO_THEME_URL,
					'priority'   => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function event_planners_enqueue_control_scripts() {

		wp_enqueue_script( 'example-1-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/example-1/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'example-1-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/example-1/customize-controls.css' );
	}
}

// Doing this customizer thang!
event_planners_Example_1_Customize::event_planners_get_instance();