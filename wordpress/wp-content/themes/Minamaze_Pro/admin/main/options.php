<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "thinkup_redux_variables";

    // This line is adding in extensions.
//    Redux::setExtensions( $opt_name, dirname(__FILE__).'/../main-extensions');

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework' ),
        'page_title'           => __( 'Theme Options', 'redux-framework' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer_only'      => false,
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
//    $args['admin_bar_links'][] = array(
//        'id'    => 'redux-docs',
//        'href'  => 'http://docs.reduxframework.com/',
//        'title' => __( 'Documentation', 'redux-framework' ),
//    );

//    $args['admin_bar_links'][] = array(
//        //'id'    => 'redux-support',
//        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
//        'title' => __( 'Support', 'redux-framework' ),
//    );

//    $args['admin_bar_links'][] = array(
//        'id'    => 'redux-extensions',
//        'href'  => 'reduxframework.com/extensions',
//        'title' => __( 'Extensions', 'redux-framework' ),
//    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
//    $args['share_icons'][] = array(
//        'url'   => 'https://github.com/',
//        'title' => 'Visit us on GitHub',
//        'icon'  => 'el el-github'
//        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
//    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/thinkupthemes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.twitter.com/thinkupthemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
//    $args['share_icons'][] = array(
//        'url'   => 'http://www.linkedin.com/',
//        'title' => 'Find us on LinkedIn',
//        'icon'  => 'el el-linkedin'
//    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
//        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework' ), $v );
    } else {
//        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework' );
    }

    // Add content after the form.
//    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

//    $tabs = array(
//        array(
//            'id'      => 'redux-help-tab-1',
//            'title'   => __( 'Theme Information 1', 'redux-framework' ),
//            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework' )
//        ),
//        array(
//            'id'      => 'redux-help-tab-2',
//            'title'   => __( 'Theme Information 2', 'redux-framework' ),
//            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework' )
//        )
//    );
//    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
//    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework' );
//    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

	// -----------------------------------------------------------------------------------
	//	0.	Customizer - Set subsections
	// -----------------------------------------------------------------------------------

	if ( is_customize_preview() ) {

		// Change subtitle text in customizer / options panel
		$thinkup_subtitle_customizer   = 'subtitle';
		$thinkup_subtitle_panel        = NULL;

		// Change section field used in customizer / options panel
		$thinkup_section_field         = 'thinkup_section';

		// Enable sub-sections in customizer
		$thinkup_customizer_subsection = true;

		Redux::setSection( $opt_name, array(
			'title'            => __( 'Theme Options', 'redux-framework' ),
			'id'               => 'thinkup_theme_options',
			'desc'             => __( 'Use the options below to customize your theme!', 'redux-framework' ),
			'customizer_width' => '400px',
			'icon'             => 'el el-home',
			'customizer'       => true,
		) );

	} else {

		// Disable sub-sections in theme options panel
		$thinkup_customizer_subsection = false;

		// Change subtitle text in customizer / options panel
		$thinkup_subtitle_customizer   = NULL;
		$thinkup_subtitle_panel        = 'subtitle';

		// Change section field used in customizer / options panel
		$thinkup_section_field         = 'section';

	}


	// -----------------------------------------------------------------------------------
	//	1.	General Settings
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('General Settings', 'redux-framework'),
		'header'     => __('Welcome to the Simple Options Framework Demo', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Logo & Favicon Settings</span>', 'redux-framework'),
		'icon_class' => '',
		'icon'       => 'el el-wrench',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => true,
		'fields'     => array(

			array(
				'title'                      => __('Logo Settings', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('If you have an image logo you can upload it, otherwise you can display a text site title', 'redux-framework'),
				$thinkup_subtitle_customizer => __('If you have an image logo you can upload it, otherwise you can display a text site title', 'redux-framework'),
				'id'                         => 'thinkup_general_logoswitch',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Custom Image Logo', 
					'option2' => 'Display Site Title',
				),
			),

			array(
				'title'                      => __('Custom Image Logo', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Upload image logo or specify the image url.<br />Name the logo image logo.png.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Upload image logo or specify the image url.<br />Name the logo image logo.png.', 'redux-framework'),
				'id'                         => 'thinkup_general_logolink',
				'type'                       => 'media',
				'url'                        => true,
				'required'                   => array( 
					array( 'thinkup_general_logoswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Custom Image Logo (Retina display)', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Upload a logo image twice the size of logo.png. Name the logo image logo@2x.png.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Upload a logo image twice the size of logo.png. Name the logo image logo@2x.png.', 'redux-framework'),
				'id'                         => 'thinkup_general_logolinkretina',
				'type'                       => 'media',
				'url'                        => true,
				'required'                   => array( 
					array( 'thinkup_general_logoswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Site Title', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Input a message to display as your site title. Leave blank to display your default site title.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input a message to display as your site title. Leave blank to display your default site title.', 'redux-framework'),
				'id'                         => 'thinkup_general_sitetitle',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_general_logoswitch', '=', 
						array( 'option2' ),
					), 
				)
			),

			array(
				'title'                      => __('Site Description', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Input a message to display as site description. Leave blank to display default site description.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input a message to display as site description. Leave blank to display default site description.', 'redux-framework'),
				'id'                         => 'thinkup_general_sitedescription',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_general_logoswitch', '=', 
						array( 'option2' ),
					), 
				)
			),

			array(
				'title'                      => __('Custom Favicon', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Uploads favicon or specify the favicon url.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Uploads favicon or specify the favicon url.', 'redux-framework'),
				'id'                         => 'thinkup_general_faviconlink',
				'type'                       => 'media',
				'url'                        => true,
			),

            array(
				'id'                         => 'thinkup_section_general_page',
				'type'                       => $thinkup_section_field,
				'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Page Structure</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Page Structure</span>', 'redux-framework'),
				'indent'                     => false,
            ),

			array(
				'title'                      => __('Page Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select page layout. This will only be applied to published Pages (I.e. Not posts, blog or home).', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select page layout. This will only be applied to published Pages (I.e. Not posts, blog or home).', 'redux-framework'),
				'id'                         => 'thinkup_general_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'default'                    => '0',
				'options'                    => array(
					'option1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
					'option2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
					'option3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the page layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the page layout.', 'redux-framework'),
				'id'                         => 'thinkup_general_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_general_layout', '=', 
						array( 'option2', 'option3' ),
					), 
				)
			),

			array(
				'title'                      => __('Enable Fixed Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable fixed layout.<br />(i.e. Disable responsive layout)', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable fixed layout.<br />(i.e. Disable responsive layout)', 'redux-framework'),
				'id'                         => 'thinkup_general_fixedlayoutswitch',
				'type'                       => 'switch',
			),

			array(
				'title'                      => __('Enable Boxed Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable boxed layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable boxed layout.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxlayout',
				'type'                       => 'switch',
				'default' 		             => 0,
			),

			array(
				'title'                      => __('Background Color For Boxed Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a custom color to use as background.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a custom color to use as background.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxbackgroundcolor',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_general_boxlayout', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'                      => __('Background Image For Boxed Layout', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Upload an image to use as background.<br />Leave blank to use custom color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Upload an image to use as background.<br />Leave blank to use custom color.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxbackgroundimage',
				'type'                       => 'media',
				'url'                        => true,
				'required'                   => array( 
					array( 'thinkup_general_boxlayout', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Background Position. Find out more <a href="http://www.w3schools.com/cssref/pr_background-position.asp">here</a>.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Background Position. Find out more <a href="http://www.w3schools.com/cssref/pr_background-position.asp">here</a>.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxedposition',
				'type'                       => 'select',
				'options'                    => array( 
					'left top'      => 'left top',
					'left center'   => 'left center',
					'left bottom'   => 'left bottom',
					'right top'     => 'right top',
					'right center'  => 'right center',
					'right bottom'  => 'right bottom',
					'center top'    => 'center top',
					'center center' => 'center center',
					'center bottom' => 'center bottom'
				),
				'required'                   => array( 
					array( 'thinkup_general_boxlayout', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Background Repeat. Find out more <a href="http://www.w3schools.com/cssref/pr_background-repeat.asp">here</a>.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Background Repeat. Find out more <a href="http://www.w3schools.com/cssref/pr_background-repeat.asp">here</a>.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxedrepeat',
				'type'                       => 'select',
				'options'                    => array( 
					"repeat"    => "repeat",
					"repeat-x"  => "repeat-x",
					"repeat-y"  => "repeat-y",
					"no-repeat" => "no-repeat"
				),
				'required'                   => array( 
					array( 'thinkup_general_boxlayout', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Background Size? Find out more <a href="http://www.w3schools.com/cssref/css3_pr_background-size.asp">here</a>.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Background Size? Find out more <a href="http://www.w3schools.com/cssref/css3_pr_background-size.asp">here</a>.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxedsize',
				'type'                       => 'select',
				'options'                    => array( 
					"auto"      => "auto",
					"cover"     => "cover",
					"constrain" => "constrain"
				),
				'required'                   => array( 
					array( 'thinkup_general_boxlayout', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Fix background or scroll? Find out more <a href="http://www.w3schools.com/cssref/pr_background-attachment.asp">here</a>.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Fix background or scroll? Find out more <a href="http://www.w3schools.com/cssref/pr_background-attachment.asp">here</a>.', 'redux-framework'),
				'id'                         => 'thinkup_general_boxedattachment',
				'type'                       => 'select',
				'options'                    => array( 
					"scroll" => "scroll",
					"fixed"  => "fixed"
				),
				'required' => array( 
					array( 'thinkup_general_boxlayout', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'                      => __('Enable Intro', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable intro.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable intro.', 'redux-framework'),
				'id'                         => 'thinkup_general_introswitch',
				'type'                       => 'switch',
				'default'                    => '1',
			),

			array(
				'title'                      => __('Enable Breadcrumbs', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable breadcrumbs.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable breadcrumbs.', 'redux-framework'),
				'id'                         => 'thinkup_general_breadcrumbswitch',
				'type'                       => 'switch',
				'default'                    => '1',
				'required'                   => array( 
					array( 'thinkup_general_introswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'                      => __('Breadcrumb Delimiter', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Specify a custom delimiter to use instead of the default &#40; / &#41; when displaying breadcrumbs.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify a custom delimiter to use instead of the default &#40; / &#41; when displaying breadcrumbs.', 'redux-framework'),
				'default'                    => '/',
				'id'                         => 'thinkup_general_breadcrumbdelimeter',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_general_breadcrumbswitch', '=', 
						array( '1' ),
					), 
				)
			),

            array(
				'id'                         => 'thinkup_section_general_code',
				'type'                       => $thinkup_section_field,
				'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Custom Code</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Custom Code</span>', 'redux-framework'),
				'indent'                     => false,
            ),

			array(
				'title'                      => __('Google Analytics Code', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Copy and paste your Google Analytics code here to apply it to all pages on your website.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Copy and paste your Google Analytics code here to apply it to all pages on your website.', 'redux-framework'),
				'id'                         => 'thinkup_general_analyticscode',
				'type'                       => 'textarea',
			),

			array(
				'desc'  => __('Check to output Analytics in header.', 'redux-framework'),
				'id'    => 'thinkup_general_analyticscodeposition',
				'type'  => 'checkbox',
			),

			array(
				'title'                      => __('Custom CSS', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Developers can use this to apply custom css. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Developers can use this to apply custom css. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.', 'redux-framework'),
				'id'                         => 'thinkup_general_customcss',
				'type'                       => 'textarea',
			),

			array(
				'title'                      => __('Custom jQuery - Front End', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Developers can use this to apply custom jQuery which will only affect the front end of the website.<br /><br />Use this to control your site by adding great jQuery features.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Developers can use this to apply custom jQuery which will only affect the front end of the website.<br /><br />Use this to control your site by adding great jQuery features.', 'redux-framework'),
				'id'                         => 'thinkup_general_customjavafront',
				'type'                       => 'textarea',
			),

			// Ensures ThinkUpThemes custom code is output
			array(
				'title'    => __('Custom Code', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Custom Code', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Custom Code', 'redux-framework'),
				'id'       => 'thinkup_customization',
				'type'     => 'thinkup_custom_code',
			),
		)
	) );

	Redux::setSection( $opt_name, array(
		'type' => 'divide',
	) );


	// -----------------------------------------------------------------------------------
	//	2.1.	Home Settings				
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Homepage', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Homepage Layout</span>', 'redux-framework'),
		'icon_class' => '',
		'icon'       => 'el el-home',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => true,
		'fields'     => array(

			array(
				'title'                      => __('Homepage Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select page layout. This will only be applied to the home page.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select page layout. This will only be applied to the home page.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'default'                    => '0',
				'options'                    => array(
					'option1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
					'option2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
					'option3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_homepage_layout', '=', 
						array( 'option2', 'option3' ),
					), 
				)
			),

            array(
				'id'                         => 'thinkup_section_homepage_slider',
				'type'                       => $thinkup_section_field,
				'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Homepage Slider</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Homepage Slider</span>', 'redux-framework'),
				'indent'                     => false,
            ),

			array(
				'title'                      => __('Enable Homepage Slider', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable home page slider.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable home page slider.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sliderswitch',
				'type'                       => 'button_set',
				'options'                    => array(
					'option1' => 'ThinkUpSlider',
					'option2' => 'Custom Slider',
					'option3' => 'Disable'
				),
				'default'                    => 'option1'
			),

			array(
				'title'                      => __('Homepage Slider Shortcode', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Input the shortcode of the slider you want to display. I.e. [shortcode_name].', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input the shortcode of the slider you want to display. I.e. [shortcode_name].', 'redux-framework'),
				'id'                         => 'thinkup_homepage_slidername',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_homepage_sliderswitch', '=', 
						array( 'option2' ),
					), 
				)
			),

			array(
				'title'                      => __('Built-In Slider', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Unlimited slides with drag and drop sortings.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Unlimited slides with drag and drop sortings.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sliderpreset',
				'type'                       => 'thinkup_slider_v3',
				'required'                   => array( 
					array( 'thinkup_homepage_sliderswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Slider Style', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a slider style. HTML, YouTube and Vimeo urls are supported for video layouts.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a slider style. HTML, YouTube and Vimeo urls are supported for video layouts.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sliderstyle',
				'type'                       => 'select',
				'options'                    => array(
					'option1' => 'Standard',
					'option2' => 'Video on left',
					'option3' => 'Video on right'
				),
				'required'                   => array( 
					array( 'thinkup_homepage_sliderswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Slider Speed', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Specify the time it takes to move to the next slide.<br />Tip: Set to 0 to disable automatic transitions.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the time it takes to move to the next slide.<br />Tip: Set to 0 to disable automatic transitions.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sliderspeed',
				'type'                       => 'slider', 
				"default"                    => "6",
				"min"                        => "0",
				"step"                       => "1",
				"max"                        => "30",
				'required'                   => array( 
					array( 'thinkup_homepage_sliderswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'id'                         => 'thinkup_homepage_sliderpresetheight',
				'type'                       => 'slider', 
				'title'                      => __('Slider Height (Max)', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Specify the maximum slider height (px).', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the maximum slider height (px).', 'redux-framework'),
				"default"                    => "350",
				"min"                        => "200",
				"step"                       => "5",
				"max"                        => "800",
				'required'                   => array( 
					array( 'thinkup_homepage_sliderswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Enable Full-Width Slider', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Switch on to enable full-width slider.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable full-width slider.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sliderpresetwidth',
				'type'                       => 'switch',
				'default'                    => '0',
				'required'                   => array( 
					array( 'thinkup_homepage_sliderswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

            array(
				'id'                         => 'thinkup_section_homepage_ctaintro',
				'type'                       => $thinkup_section_field,
				'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Call To Action - Intro</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Call To Action - Intro</span>', 'redux-framework'),
				'indent'                     => false,
            ),

			array(
				'title' => __('Message', 'redux-framework'), 
				'desc'  => __('Check to enable intro on home page.', 'redux-framework'),
				'id'    => 'thinkup_homepage_introswitch',
				'type'  => 'checkbox',
			),

			array(
				$thinkup_subtitle_panel      => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_introaction',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				$thinkup_subtitle_panel      => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_introactionteaser',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Button Text', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Input text to display on the action button.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input text to display on the action button.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_introactionbutton',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Link', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_introactionlink',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Link to a Page',
					'option2' => 'Specify Custom link',
					'option3' => 'Disable Link'
				),
			),

			array(
				'title'                      => __('Link to a page', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a target page for action button link.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a target page for action button link.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_introactionpage',
				'type'                       => 'select',
				'data'                       => 'pages',
				'required'                   => array( 
					array( 'thinkup_homepage_introactionlink', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Custom link', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_introactioncustom',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_homepage_introactionlink', '=', 
						array( 'option2' ),
					), 
				)
			),

            array(
				'id'                         => 'thinkup_section_homepage_ctaoutro',
				'type'                       => $thinkup_section_field,
				'title'                      => __( ' ', 'redux-framework-demo' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Call To Action - Outro</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Call To Action - Outro</span>', 'redux-framework'),
				'indent'                     => false,
            ),

			array(
				'title' => __('Message', 'redux-framework'), 
				'desc'  => __('Check to enable outro on home page.', 'redux-framework'),
				'id'    => 'thinkup_homepage_outroswitch',
				'type'  => 'checkbox',
			),

			array(
				$thinkup_subtitle_panel      => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_outroaction',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				$thinkup_subtitle_panel      => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_outroactionteaser',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Button Text', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Input text to display on the action button.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input text to display on the action button.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_outroactionbutton',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Link', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_outroactionlink',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Link to a Page',
					'option2' => 'Specify Custom link',
					'option3' => 'Disable Link'
				),
			),

			array(
				'title'                      => __('Link to a page', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a target page for action button link.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a target page for action button link.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_outroactionpage',
				'type'                       => 'select',
				'data'                       => 'pages',
				'required'                   => array( 
					array( 'thinkup_homepage_outroactionlink', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Custom link', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_outroactioncustom',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_homepage_outroactionlink', '=', 
						array( 'option2' ),
					), 
				)
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	2.2.	Homepage (Featured)
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Homepage (Featured)', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Display Pre-Designed Homepage Layout</span>', 'redux-framework'),
		'icon_class' => '',
		'icon'       => 'el el-pencil',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => true,
		'fields'     => array(

			array(
				'title'                      => __('Enable Pre-Made Homepage ', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('switch on to enable pre-designed homepage layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('switch on to enable pre-designed homepage layout.', 'redux-framework'),
				'id'                         => 'thinkup_homepage_sectionswitch',
				'type'                       => 'switch',
				'default'                    => '1',
			),

			array(
				'title'    => __('Content Area 1', 'redux-framework'),
				'desc'     => __('Add an image for the section background.', 'redux-framework'),
				'id'       => 'thinkup_homepage_section1_image',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Check to disable image cropping.', 'redux-framework'),
				'id'       => 'thinkup_homepage_section1_imagesize',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section1_title',
				'desc'     => __('Add a title to the section.', 'redux-framework'),
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section1_desc',
				'desc'     => __('Add some text to featured section 1.', 'redux-framework'),
				'type'     => 'textarea',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section1_link',
				'desc'     => __('Link to a page', 'redux-framework'), 
				'type'     => 'select',
				'data'     => 'pages',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section1_url',
				'desc'     => __('Link to a custom page. This will override the page link specified above.', 'redux-framework'), 
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section1_target',
				'desc'     => __('Link target', 'redux-framework'), 
				'type'     => 'select',
				'options'  => array( 
					'option1' => 'Current tab',
					'option2' => 'New tab',
				),
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section1_button',
				'desc'     => __('Add a custom button text (Default: Read More).', 'redux-framework'), 
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'    => __('Content Area 2', 'redux-framework'),
				'desc'     => __('Add an image for the section background.', 'redux-framework'),
				'id'       => 'thinkup_homepage_section2_image',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Check to disable image cropping.', 'redux-framework'),
				'id'       => 'thinkup_homepage_section2_imagesize',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section2_title',
				'desc'     => __('Add a title to the section.', 'redux-framework'),
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section2_desc',
				'desc'     => __('Add some text to featured section 2.', 'redux-framework'),
				'type'     => 'textarea',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section2_link',
				'desc'     => __('Link to a page', 'redux-framework'), 
				'type'     => 'select',
				'data'     => 'pages',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section2_url',
				'desc'     => __('Link to a custom page. This will override the page link specified above.', 'redux-framework'), 
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section2_target',
				'desc'     => __('Link target', 'redux-framework'), 
				'type'     => 'select',
				'options'  => array( 
					'option1' => 'Current tab',
					'option2' => 'New tab',
				),
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section2_button',
				'desc'     => __('Add a custom button text (Default: Read More).', 'redux-framework'), 
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'    => __('Content Area 3', 'redux-framework'),
				'desc'     => __('Add an image for the section background.', 'redux-framework'),
				'id'       => 'thinkup_homepage_section3_image',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Check to disable image cropping.', 'redux-framework'),
				'id'       => 'thinkup_homepage_section3_imagesize',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section3_title',
				'desc'     => __('Add a title to the section.', 'redux-framework'),
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section3_desc',
				'desc'     => __('Add some text to featured section 3.', 'redux-framework'),
				'type'     => 'textarea',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section3_link',
				'desc'     => __('Link to a page', 'redux-framework'), 
				'type'     => 'select',
				'data'     => 'pages',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section3_url',
				'desc'     => __('Link to a custom page. This will override the page link specified above.', 'redux-framework'), 
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section3_target',
				'desc'     => __('Link target', 'redux-framework'), 
				'type'     => 'select',
				'options'  => array( 
					'option1' => 'Current tab',
					'option2' => 'New tab',
				),
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_homepage_section3_button',
				'desc'     => __('Add a custom button text (Default: Read More).', 'redux-framework'), 
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_homepage_sectionswitch', '=', 
						array( '1' ),
					), 
				)
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	3.	Header
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Header', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Header Content</span>', 'redux-framework'),
		'icon'       => 'el el-chevron-up',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => true,
		'fields'     => array(
		
			array(
				'title'                      => __('Choose Header Style', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the header layout. Style 2 allows for a larger centred logo image.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the header layout. Style 2 allows for a larger centred logo image.', 'redux-framework'),
				'id'                         => 'thinkup_header_styleswitch',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Style 1',
					'option2' => 'Style 2',
				),
			),

			array(
				'title'                      => __('Sticky Header', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to fix header to top of page.<br />Not recommended for use with header image.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to fix header to top of page.<br />Not recommended for use with header image.', 'redux-framework'),
				'id'                         => 'thinkup_header_stickyswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'title'                      => __('Header Image', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to add image above header.<br />Note: Image will be centered in the header area.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to add image above header.<br />Note: Image will be centered in the header area.', 'redux-framework'),
				'id'                         => 'thinkup_header_imageswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Choose header image. <strong>Tip:</strong> Remember you can always crop your images directly from the media library so your image shows only what you want.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose header image. <strong>Tip:</strong> Remember you can always crop your images directly from the media library so your image shows only what you want.', 'redux-framework'),
				'id'                         => 'thinkup_header_imagelink',
				'type'                       => 'media',
				'url'                        => true,
				'required'                   => array( 
					array( 'thinkup_header_imageswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Link header image.<br />Add http:// as the url is an external link.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Link header image.<br />Add http:// as the url is an external link.', 'redux-framework'),
				'id'                         => 'thinkup_header_imageurl',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_header_imageswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Header image width', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Header image width', 'redux-framework'),
				'desc'                       => __('Check to restrict header image width to 1170px', 'redux-framework'),
				'id'                         => 'thinkup_header_imagewidth',
				'type'                       => 'checkbox',
				'default'                    => '0',
				'required'                   => array( 
					array( 'thinkup_header_imageswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'                      => __('Enable Search', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable header search.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable header search.', 'redux-framework'),
				'id'                         => 'thinkup_header_searchswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'title'                      => __('Enable Social Media Links', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable links to social media pages.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable links to social media pages.', 'redux-framework'),
				'id'                         => 'thinkup_header_socialswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

            array(
                'id'                         => 'thinkup_section_header_social',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Social Media Content</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Social Media Content</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Display Message', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Add a message here. E.g. &#34;Follow Us&#34;.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Add a message here. E.g. &#34;Follow Us&#34;.', 'redux-framework'),
				'id'                         => 'thinkup_header_socialmessage',
				'type'                       => 'text',
				'validate'                   => 'html',
			),					

			// Facebook social settings
			array(
				'title'                      => __('Facebook', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Facebook profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Facebook profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_facebookswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Facebook page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_facebooklink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_facebookswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				'desc'     => __('Use Custom Facebook Icon', 'redux-framework'),
				'id'       => 'thinkup_header_facebookiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_facebookswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_facebookcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_facebookswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Twitter social settings
			array(
				'title'                      => __('Twitter', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Twitter profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Twitter profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_twitterswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Twitter page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_twitterlink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_twitterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Twitter Icon', 'redux-framework'),
				'id'       => 'thinkup_header_twittericonswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_twitterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_twittercustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_twitterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Google+ social settings
			array(
				'title'                      => __('Google+', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Google+ profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Google+ profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_googleswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Google+ page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_googlelink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_googleswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Google+ Icon', 'redux-framework'),
				'id'       => 'thinkup_header_googleiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_googleswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_googlecustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_googleswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Instagram social settings
			array(
				'title'                      => __('Instagram', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Instagram profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Instagram profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_instagramswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Instagram page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_instagramlink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_instagramswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Instagram Icon', 'redux-framework'),
				'id'       => 'thinkup_header_instagramiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_instagramswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_instagramcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_instagramswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Tumblr social settings
			array(
				'title'                      => __('Tumblr', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Tumblr profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Tumblr profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_tumblrswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Tumblr page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_tumblrlink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_tumblrswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Tumblr Icon', 'redux-framework'),
				'id'       => 'thinkup_header_tumblriconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_tumblrswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_tumblrcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_tumblrswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// LinkedIn social settings
			array(
				'title'                      => __('LinkedIn', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to LinkedIn profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to LinkedIn profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_linkedinswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your LinkedIn page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_linkedinlink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_linkedinswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom LinkedIn Icon', 'redux-framework'),
				'id'       => 'thinkup_header_linkediniconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_linkedinswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_linkedincustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_linkedinswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Flickr social settings
			array(
				'title'                      => __('Flickr', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Flickr profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Flickr profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_flickrswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Flickr page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_flickrlink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_flickrswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Flickr Icon', 'redux-framework'),
				'id'       => 'thinkup_header_flickriconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_flickrswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_flickrcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_flickrswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Pinterest social settings
			array(
				'title'                      => __('Pinterest', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Pinterest profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Pinterest profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_pinterestswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Pinterest page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_pinterestlink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_pinterestswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				'desc'     => __('Use Custom Pinterest Icon', 'redux-framework'),
				'id'       => 'thinkup_header_pinteresticonswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_pinterestswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_pinterestcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_pinterestswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Xing social settings
			array(
				'title'                      => __('Xing', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Xing profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Xing profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_xingswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),
				
			array(
				'desc'     => __('Input the url to your Xing page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_xinglink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_xingswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Xing Icon', 'redux-framework'),
				'id'       => 'thinkup_header_xingiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_xingswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_xingcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_xingswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// PayPal social settings
			array(
				'title'                      => __('PayPal', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to PayPal profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to PayPal profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_paypalswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your PayPal page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_paypallink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_paypalswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom PayPal Icon', 'redux-framework'),
				'id'       => 'thinkup_header_paypaliconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_paypalswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_paypalcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_paypalswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// YouTube social settings
			array(
				'title'                      => __('YouTube', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to YouTube profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to YouTube profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_youtubeswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your YouTube page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_youtubelink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_youtubeswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				'desc'     => __('Use Custom YouTube Icon', 'redux-framework'),
				'id'       => 'thinkup_header_youtubeiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_youtubeswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_youtubecustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_youtubeswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Vimeo social settings
			array(
				'title'                      => __('Vimeo', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Vimeo profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Vimeo profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_vimeoswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input the url to your Vimeo page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_vimeolink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_vimeoswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Vimeo Icon', 'redux-framework'),
				'id'       => 'thinkup_header_vimeoiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_vimeoswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_vimeocustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_vimeoswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// RSS social settings
			array(
				'title'                      => __('RSS', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to RSS profile.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to RSS profile.', 'redux-framework'),
				'id'                         => 'thinkup_header_rssswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),
				
			array(
				'desc'     => __('Input the url to your RSS page. <strong>Note:</strong> Add http:// as the url is an external link.', 'redux-framework'),
				'id'       => 'thinkup_header_rsslink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_rssswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				'desc'     => __('Use Custom RSS Icon', 'redux-framework'),
				'id'       => 'thinkup_header_rssiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_rssswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_rsscustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_rssswitch', '=', 
						array( '1' ),
					), 
				)
			),

			// Email social settings
			array(
				'title'                      => __('Email', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Enable link to Email.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enable link to Email.', 'redux-framework'),
				'id'                         => 'thinkup_header_emailswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'desc'     => __('Input your email address.', 'redux-framework'),
				'id'       => 'thinkup_header_emaillink',
				'type'     => 'text',
				'validate' => 'html',
				'required' => array( 
					array( 'thinkup_header_emailswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Use Custom Email Icon', 'redux-framework'),
				'id'       => 'thinkup_header_emailiconswitch',
				'type'     => 'checkbox',
				'default'  => '0',
				'required' => array( 
					array( 'thinkup_header_emailswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'redux-framework'),
				'id'       => 'thinkup_header_emailcustomicon',
				'type'     => 'media',
				'url'      => true,
				'required' => array( 
					array( 'thinkup_header_emailswitch', '=', 
						array( '1' ),
					), 
				)
			),
		)
	) );
	
	
	// -----------------------------------------------------------------------------------
	//	4.	Footer
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Footer', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Footer Content</span>', 'redux-framework'),
		'icon'       => 'el el-chevron-down',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => true,
		'fields'     => array(

			array(
				'title'                      => __('Footer Widgets Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select footer layout. Take complete control of the footer content by adding widgets.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select footer layout. Take complete control of the footer content by adding widgets.', 'redux-framework'),
				'id'                         => 'thinkup_footer_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'default'                    => '0',
				'options'                    => array(
					'option1' => ReduxFramework::$_url . 'assets/img/layout/footer/option01.png',
					'option2' => ReduxFramework::$_url . 'assets/img/layout/footer/option02.png',
					'option3' => ReduxFramework::$_url . 'assets/img/layout/footer/option03.png',
					'option4' => ReduxFramework::$_url . 'assets/img/layout/footer/option04.png',
					'option5' => ReduxFramework::$_url . 'assets/img/layout/footer/option05.png',
					'option6' => ReduxFramework::$_url . 'assets/img/layout/footer/option06.png',
					'option7' => ReduxFramework::$_url . 'assets/img/layout/footer/option07.png',
					'option8' => ReduxFramework::$_url . 'assets/img/layout/footer/option08.png',
					'option9' => ReduxFramework::$_url . 'assets/img/layout/footer/option09.png',
					'option10' => ReduxFramework::$_url . 'assets/img/layout/footer/option10.png',
					'option11' => ReduxFramework::$_url . 'assets/img/layout/footer/option11.png',
					'option12' => ReduxFramework::$_url . 'assets/img/layout/footer/option12.png',
					'option13' => ReduxFramework::$_url . 'assets/img/layout/footer/option13.png',
					'option14' => ReduxFramework::$_url . 'assets/img/layout/footer/option14.png',
					'option15' => ReduxFramework::$_url . 'assets/img/layout/footer/option15.png',
					'option16' => ReduxFramework::$_url . 'assets/img/layout/footer/option16.png',
					'option17' => ReduxFramework::$_url . 'assets/img/layout/footer/option17.png',
					'option18' => ReduxFramework::$_url . 'assets/img/layout/footer/option18.png',
				),
			),

			array(
				'title'   => __('Disable Footer Widgets', 'redux-framework'), 
				'desc'    => __('Check to disable footer widgets.', 'redux-framework'),
				'id'      => 'thinkup_footer_widgetswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				'title'                      => __('Copyright Text', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Add custom copyright text.<br />Leave blank to display default message.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Add custom copyright text.<br />Leave blank to display default message.', 'redux-framework'),
				'id'                         => 'thinkup_footer_copyright',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

            array(
                'id'                         => 'thinkup_section_footer_ctaoutro',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Call To Action - Outro Inner Pages</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Call To Action - Outro Inner Pages</span>', 'redux-framework'),
                'indent'                     => false,
            ),	

			array(
				'title'   => __('Message', 'redux-framework'), 
				'desc'    => __('Check to enable outro on all inner pages.', 'redux-framework'),
				'id'      => 'thinkup_footer_outroswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'redux-framework'),
				'id'                         => 'thinkup_footer_outroaction',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				$thinkup_subtitle_panel      => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'redux-framework'),
				'id'                         => 'thinkup_footer_outroactionteaser',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Button Text', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Input text to display on the action button.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input text to display on the action button.', 'redux-framework'),
				'id'                         => 'thinkup_footer_outroactionbutton',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Link', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'redux-framework'),
				'id'                         => 'thinkup_footer_outroactionlink',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Link to a Page',
					'option2' => 'Specify Custom link',
					'option3' => 'Disable Link'
				),
			),

			array(
				'title'                      => __('Link to a page', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a target page for action button link.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a target page for action button link.', 'redux-framework'),
				'id'                         => 'thinkup_footer_outroactionpage',
				'type'                       => 'select',
				'data'                       => 'pages',
				'required'                   => array( 
					array( 'thinkup_footer_outroactionlink', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Custom link', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'redux-framework'),
				'id'                         => 'thinkup_footer_outroactioncustom',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_footer_outroactionlink', '=', 
						array( 'option2' ),
					), 
				)
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	5.	Blog
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Blog', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Blog Pages</span>', 'redux-framework'),
		'icon'       => 'el el-comment',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => true,
		'fields'     => array(

			array(
				'title'                      => __('Blog Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select blog page layout. Only applied to the main blog page and not individual posts.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select blog page layout. Only applied to the main blog page and not individual posts.', 'redux-framework'),
				'id'                         => 'thinkup_blog_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'options'                    => array(
					'option1' => ReduxFramework::$_url . 'assets/img/layout/blog/option01.png',
					'option2' => ReduxFramework::$_url . 'assets/img/layout/blog/option02.png',
					'option3' => ReduxFramework::$_url . 'assets/img/layout/blog/option03.png',
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('<strong>Note:</strong> Sidebars will not be applied to homepage Blog. Control sidebars on the homepage from the &#39;Home Settings&#39; option.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<strong>Note:</strong> Sidebars will not be applied to homepage Blog. Control sidebars on the homepage from the &#39;Home Settings&#39; option.', 'redux-framework'),
				'id'                         => 'thinkup_blog_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_blog_layout', '=', 
						array( 'option2', 'option3' ),
					), 
				)
			),

			array(
				'title'                      => __('Blog Style', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a style for the blog page. This will also be applied to all pages set using the blog template.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a style for the blog page. This will also be applied to all pages set using the blog template.', 'redux-framework'),
				'id'                         => 'thinkup_blog_style',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Style 1',
					'option2' => 'Style 2',
				),
			),

			array(
				'title'                      => __('Blog Grid Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a column layout for your blog page. This will also be applied to all pages set using the blog template.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a column layout for your blog page. This will also be applied to all pages set using the blog template.', 'redux-framework'),
				'id'                         => 'thinkup_blog_stylegrid',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => '1 column',
					'option2' => '2 column',
					'option3' => '3 column',
					'option4' => '4 column',
				),
				'required'                   => array( 
					array( 'thinkup_blog_style', '=', 
						array( 'option2' ),
					), 
				)
			),

			array(
				'title'   => __('Hide Post Title', 'redux-framework'), 
				'desc'    => __('Check to disable post title on blog page.', 'redux-framework'),
				'id'      => 'thinkup_blog_title',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				'title'   => __('Blog Meta Content', 'redux-framework'), 
				'id'      => 'thinkup_blog_contentcheck',
				'type'    => 'checkbox',
				'options' => array(
					'option1' => 'Hide date posted.',
					'option2' => 'Hide post author.',
					'option3' => 'Hide total comments.',
					'option4' => 'Hide post categories.',
					'option5' => 'Hide post tags.'
				),
			),

			array(
				'title'                      => __('Post Content', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Control how much content you want to show from each post on the main blog page. Remember to control the full article content by using the Wordpress <a href="http://en.support.wordpress.com/splitting-content/more-tag/">more</a> tag in your post.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Control how much content you want to show from each post on the main blog page. Remember to control the full article content by using the Wordpress <a href="http://en.support.wordpress.com/splitting-content/more-tag/">more</a> tag in your post.', 'redux-framework'),
				'id'                         => 'thinkup_blog_postswitch',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Show excerpt',
					'option2' => 'Show full article',
					'option3' => 'Hide article',
				),
			),

			array(
				'title'                      => __('Excerpt Length', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify number of words in post excerpt.<br />Default = 55.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify number of words in post excerpt.<br />Default = 55.', 'redux-framework'),
				'id'                         => 'thinkup_blog_postexcerpt',
				'type'                       => 'select',
				'data'                       => 'excerpt',
				'required'                   => array( 
					array( 'thinkup_blog_postswitch', '=', 
						array( 'option1' ),
					), 
				)
			),

            array(
                'id'                         => 'thinkup_section_post_layout',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Control Single Post Page</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Control Single Post Page</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Post Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select blog page layout. This will only be applied to individual posts and not the main blog page.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select blog page layout. This will only be applied to individual posts and not the main blog page.', 'redux-framework'),
				'id'                         => 'thinkup_post_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'default'                    => 'option1',
				'options'                    => array(
					'option1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
					'option2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
					'option3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				'id'                         => 'thinkup_post_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_post_layout', '=', 
						array( 'option2', 'option3' ),
					), 
				)
			),

			array(
				'title'   => __('Post Meta Content', 'redux-framework'), 
				'id'      => 'thinkup_post_contentcheck',
				'type'    => 'checkbox',
				'options' => array(
					'option1' => 'Hide date posted.',
					'option2' => 'Hide post author.',
					'option3' => 'Hide total comments.',
					'option4' => 'Hide post categories.',
					'option5' => 'Hide post tags.'
				),
			),

			array(
				'title'                      => __('Show Author Bio', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable the author biography.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable the author biography.', 'redux-framework'),
				'id'                         => 'thinkup_post_authorbio',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'title'                      => __('Show Social Sharing', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable social media sharing.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable social media sharing.', 'redux-framework'),
				'id'                         => 'thinkup_post_share',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'title'                      => __('Sharing Message', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify a message to encourage sharing.<br />Leave blank to display the default message.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify a message to encourage sharing.<br />Leave blank to display the default message.', 'redux-framework'),
				'id'                         => 'thinkup_post_sharemessage',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_post_share', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'id'       => 'thinkup_post_sharecheck',
				'type'     => 'checkbox',
				'options'  => array(
					'option1' => 'Enable sharing on Facebook',
					'option2' => 'Enable sharing on Twitter',
					'option3' => 'Enable sharing on Google+',
					'option4' => 'Enable sharing on LinkedIn',
					'option5' => 'Enable sharing on Tumblr',
					'option6' => 'Enable sharing on Pinterest',
					'option7' => 'Enable sharing on email',
				),
				'required' => array( 
					array( 'thinkup_post_share', '=', 
						array( '1' ),
					), 
				)
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	6.	Portfolio
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Portfolio', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Portfolio Settings</span>', 'redux-framework'),
		'icon'       => 'el el-th',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'                      => __('Portfolio Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select Portfolio page layout. This will only be applied to the main portfolio page and not individual projects.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select Portfolio page layout. This will only be applied to the main portfolio page and not individual projects.', 'redux-framework'),
				'id'                         => 'thinkup_portfolio_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'options'                    => array(
					'option1' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option01.png',
					'option2' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option02.png',
					'option3' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option03.png',
					'option4' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option04.png',
					'option5' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option05.png',
					'option6' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option06.png',
					'option7' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option07.png',
					'option8' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option08.png',
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				'id'                         => 'thinkup_portfolio_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_portfolio_layout', '=', 
						array( 'option5', 'option6', 'option7', 'option8' ),
					), 
				)
			),

			array(
				'title'                      => __('Portfolio Style', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a layout for the portfolio items.<br />The hover effect will be applied by default.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a layout for the portfolio items.<br />The hover effect will be applied by default.', 'redux-framework'),
				'id'                         => 'thinkup_portfolio_style',
				'type'                       => 'radio',
				'default'                    => 'option1',
				'options'                    => array( 
					'option1' => 'Hover Style',
				),
			),

			array(
				'title'   => __('Portfolio Hover Content', 'redux-framework'), 
				'id'      => 'thinkup_portfolio_hovercheck',
				'type'    => 'checkbox',
				'options' => array(
					'option1' => 'Check to show project title',
					'option2' => 'Check to show project excerpt',
					'option3' => 'Check to show project link',
					'option4' => 'Check to show image lightbox'
				),
			),

            array(
                'id'                         => 'thinkup_section_project_layout',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Project Settings</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Project Settings</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Project Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select project layout. This will only be applied to individual project pages (I.e. Not portfolio page).', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select project layout. This will only be applied to individual project pages (I.e. Not portfolio page).', 'redux-framework'),
				'id'                         => 'thinkup_project_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'default'                    => 'option1',
				'options'                    => array(
					'option1' => array('alt' => '1 Column', 'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
					'option2' => array('alt' => '2 Column Left', 'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
					'option3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),	
				),
			),					

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				'id'                         => 'thinkup_project_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_project_layout', '=', 
						array( 'option2', 'option3' ),
					), 
				)
			),

			array(
				'title'   => __('Project Information', 'redux-framework'), 
				'id'      => 'thinkup_project_infocheck',
				'type'    => 'checkbox',
				'options' => array(
					'option1' => 'Hide client name.',
					'option2' => 'Hide date completed.',
					'option3' => 'Hide skills used.',
					'option4' => 'Hide project URL.',
				),
			),

			array(
				'title'   => __('Project Navigation', 'redux-framework'), 
				'desc'    => __('Check to allow navigation between projects.', 'redux-framework'),
				'id'      => 'thinkup_project_navigationswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	7.	Contact Page
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Contact Page', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Contact Us Page</span>', 'redux-framework'),
		'icon'       => 'el el-envelope',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'                      => __('Google Map Shortcode', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Insert Google Map shortcode.<br><br>You can add a shortcode from any Google Maps plugin you like. A free plugin avaialble at WordPress.org is <a href="https://wordpress.org/plugins/google-maps-ready/" target="_blank" style="text-decoration: none;">Ready! Google Maps</a>.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Insert Google Map shortcode.<br><br>You can add a shortcode from any Google Maps plugin you like. A free plugin avaialble at WordPress.org is <a href="https://wordpress.org/plugins/google-maps-ready/" target="_blank" style="text-decoration: none;">Ready! Google Maps</a>.', 'redux-framework'),
				'id'                         => 'thinkup_contact_map',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Contact Form Shortcode', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Insert contact form shortcode.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Insert contact form shortcode.', 'redux-framework'),
				'id'                         => 'thinkup_contact_form',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Company Information', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Add more details about your company.<br />Give more information about what you do.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Add more details about your company.<br />Give more information about what you do.', 'redux-framework'),
				'id'                         => 'thinkup_contact_info',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),

            array(
                'id'                         => 'thinkup_section_contact_address',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Contact Details</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Contact Details</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				$thinkup_subtitle_panel      => __('Address line 1.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Address line 1.', 'redux-framework'),
				'id'                         => 'thinkup_contact_line1',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				$thinkup_subtitle_panel      => __('Address line 2.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Address line 2.', 'redux-framework'),
				'id'                         => 'thinkup_contact_line2',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				$thinkup_subtitle_panel      => __('City / State.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('City / State.', 'redux-framework'),
				'id'                         => 'thinkup_contact_city',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				$thinkup_subtitle_panel      => __('Country.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Country.', 'redux-framework'),
				'id'                         => 'thinkup_contact_country',
				'type'                       => 'text',
				'validate'                   => 'html',
			),				

			array(
				$thinkup_subtitle_panel      => __('Zip Code.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Zip Code.', 'redux-framework'),
				'id'                         => 'thinkup_contact_zip',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

            array(
                'id'                         => 'thinkup_section_contact_address',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Contact Details</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Contact Details</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				$thinkup_subtitle_panel      => __('Telephone Number.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Telephone Number.', 'redux-framework'),
				'id'                         => 'thinkup_contact_telephone',
				'type'                       => 'text',
				'validate'                   => 'no_special_chars',
			),

			array(
				$thinkup_subtitle_panel      => __('Fax Number.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Fax Number.', 'redux-framework'),
				'id'                         => 'thinkup_contact_fax',
				'type'                       => 'text',
				'validate'                   => 'no_special_chars',
			),

			array(
				$thinkup_subtitle_panel      => __('Email Address.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Email Address.', 'redux-framework'),
				'msg'                        => 'Check email address is correct.',
				'id'                         => 'thinkup_contact_email',
				'type'                       => 'text',
				'validate'                   => 'email',
			),

			array(
				$thinkup_subtitle_panel      => __('Website Address.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Website Address.', 'redux-framework'),
				'id'                         => 'thinkup_contact_website',
				'type'                       => 'text',
				'validate'                   => 'html',
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	8.	Special Page
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Special Pages', 'redux-framework'),
		'desc'       => __('<span class="redux-title">404 Error Page</span>', 'redux-framework'),
		'icon'       => 'el el-star',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'                      => __('Custom Content', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Overwrite the theme standard 404 error page message by adding your own HTML content.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Overwrite the theme standard 404 error page message by adding your own HTML content.', 'redux-framework'),
				'id'                         => 'thinkup_404_content',
				'type'                       => 'editor',
			),

			array(
				'desc'    => __('Check to disable autoparagraph.', 'redux-framework'),
				'id'      => 'thinkup_404_contentparagraph',
				'type'    => 'checkbox',
				'default' => '0',
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	9.	Notification Bar
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Notification Bar', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Notification Bar</span>', 'redux-framework'),
		'icon'       => 'el el-bullhorn',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'   => __('Enable Notification Bar', 'redux-framework'), 
				'desc'    => __('Check to show notification bar on site.', 'redux-framework'),
				'id'      => 'thinkup_notification_switch',
				'type'    => 'checkbox',
				'default' => '0',
			),	

			array(
				'title'                      => __('Notification Bar Message', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Enter a message for your notification bar.<br /><br />This will be one of the first things that visitors see on your site. Make it interesting to make as many visitors as possible convert.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Enter a message for your notification bar.<br /><br />This will be one of the first things that visitors see on your site. Make it interesting to make as many visitors as possible convert.', 'redux-framework'),
				'id'                         => 'thinkup_notification_text',
				'type'                       => 'textarea',
				'validate'                   => 'html',
			),			

			array(
				'title'                      => __('Button Text', 'redux-framework'),
				$thinkup_subtitle_panel      => __('This is some sample user description text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('This is some sample user description text.', 'redux-framework'),
				'id'                         => 'thinkup_notification_button',
				'type'                       => 'text',
				'validate'                   => 'html',
			),

			array(
				'title'                      => __('Add Button Link', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify whether the notification bar should link to a page on your site, out to external webpage disable the link altogether.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify whether the notification bar should link to a page on your site, out to external webpage disable the link altogether.', 'redux-framework'),
				'id'                         => 'thinkup_notification_link',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Link to a Page',
					'option2' => 'Specify Custom link',
					'option3' => 'Disable Link',
				),
			),

			array(
				'title'                      => __('Link to a page', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select a target page for action button link.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a target page for action button link.', 'redux-framework'),
				'id'                         => 'thinkup_notification_linkpage',
				'type'                       => 'select',
				'data'                       => 'pages',
				'required'                   => array( 
					array( 'thinkup_notification_link', '=', 
						array( 'option1' ),
					), 
				)
			),

			array(
				'title'                      => __('Custom Link', 'redux-framework'),
				$thinkup_subtitle_panel      => __('Input a custom url for the action button link.<br />Add http:// if linking to an external webpage.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Input a custom url for the action button link.<br />Add http:// if linking to an external webpage.', 'redux-framework'),
				'id'                         => 'thinkup_notification_linkcustom',
				'type'                       => 'text',
				'validate'                   => 'html',
				'required'                   => array( 
					array( 'thinkup_notification_link', '=', 
						array( 'option2' ),
					), 
				)
			),

            array(
                'id'                         => 'thinkup_section_notification_positioning',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Positioning</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Positioning</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'   => __('Only show on homepage?', 'redux-framework'), 
				'desc'    => __('Check to only show on homepage.', 'redux-framework'),
				'id'      => 'thinkup_notification_homeswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),
				
			array(
				'title'   => __('Fix Bar Position', 'redux-framework'), 
				'desc'    => __('Check to stick bar to the top of the page.', 'redux-framework'),
				'id'      => 'thinkup_notification_fixtop',
				'type'    => 'checkbox',
				'default' => '0',
			),

            array(
                'id'                         => 'thinkup_section_notification_styling',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Styling</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Styling</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'   => __('Notification Bar', 'redux-framework'), 
				'desc'    => __('Use custom color scheme.', 'redux-framework'),
				'id'      => 'thinkup_notification_backgroundcolourswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				'id'       => 'thinkup_notification_backgroundcolour',
				'type'     => 'color',
				'validate' => 'color',
				'default'  => '#FFFFFF',
			),

			array(
				'title'   => __('Main Message', 'redux-framework'), 
				'desc'    => __('Use custom color scheme.', 'redux-framework'),
				'id'      => 'thinkup_notification_maintextcolourswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				'id'       => 'thinkup_notification_maintextcolour',
				'type'     => 'color',
				'validate' => 'color',
				'default'  => '#FFFFFF',
			),

			array(
				'title'   => __('Button', 'redux-framework'), 
				'desc'    => __('Use custom color scheme.', 'redux-framework'),
				'id'      => 'thinkup_notification_buttoncolourswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				'id'       => 'thinkup_notification_buttoncolour',
				'type'     => 'color',
				'validate' => 'color',
				'default'  => '#FFFFFF',
			),

			array(
				'title'   => __('Button Text', 'redux-framework'), 
				'desc'    => __('Use custom color scheme.', 'redux-framework'),
				'id'      => 'thinkup_notification_buttontextcolourswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				'id'       => 'thinkup_notification_buttontextcolour',
				'type'     => 'color',
				'validate' => 'color',
				'default'  => '#FFFFFF',
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	11.	Search Engine Optimisation
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('SEO', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Search Engine Optimization</span>', 'redux-framework'),
		'icon'       => 'el el-search',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'                      => __('Enable SEO?', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable SEO features.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable SEO features.', 'redux-framework'),
				'id'                         => 'thinkup_seo_switch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				'title'                      => __('Home Page Title', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('This title will only be shown on the homepage.<br />Note: Add titles to inner pages individually.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('This title will only be shown on the homepage.<br />Note: Add titles to inner pages individually.', 'redux-framework'),
				'id'                         => 'thinkup_seo_sitetitle',
				'type'                       => 'text',
				'validate'                   => 'no_html',
			),

			array(
				'title'                      => __('Homepage Description', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Write a short and snappy description about what your site offers. This helps search engines learn more about your site.<br /><br />By default this is displayed on all pages. The description can be overwritten on individual pages.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Write a short and snappy description about what your site offers. This helps search engines learn more about your site.<br /><br />By default this is displayed on all pages. The description can be overwritten on individual pages.', 'redux-framework'),
				'id'                         => 'thinkup_seo_homedescription',
				'type'                       => 'textarea',
				'validate'                   => 'no_html',
			),

			array(
				'title'                      => __('Keywords (Comma Separated)', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Add keywords that are relevant for your site. This helps search engines learn more about your site.<br /><br />By default this is displayed on all pages. The keywords can be overwritten on individual pages.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Add keywords that are relevant for your site. This helps search engines learn more about your site.<br /><br />By default this is displayed on all pages. The keywords can be overwritten on individual pages.', 'redux-framework'),
				'id'                         => 'thinkup_seo_sitekeywords',
				'type'                       => 'textarea',
				'validate'                   => 'no_html',
			),

			array(
				'title'   => __('Meta Robot Tags', 'redux-framework'), 
				'id'      => 'thinkup_seo_metarobots',
				'type'    => 'checkbox',
				'options' => array(
					'option1' => 'Enable sitewide &#39;noodp&#39; meta tag.',
					'option2' => 'Enable sitewide &#39;noydir&#39; meta tag.',
				),
			),

            array(
                'id'                         => 'thinkup_section_seo_metainfo',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('Learn more about how <strong><u>noodp</u></strong> and <strong><u>noydir</u></strong> tags can influence your SEO and SERP results on <a href="http://en.wikipedia.org/wiki/Meta_element">Wikipedia</a>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Learn more about how <strong><u>noodp</u></strong> and <strong><u>noydir</u></strong> tags can influence your SEO and SERP results on <a href="http://en.wikipedia.org/wiki/Meta_element">Wikipedia</a>', 'redux-framework'),
                'indent'                     => false,
            ),
		)
	) );	


	// -----------------------------------------------------------------------------------
	//	12.	Typography
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Typography', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Control Font Family</span>', 'redux-framework'),
		'icon'       => 'el el-font',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'   => __('Body Font', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_bodyswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for body text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for body text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				'id'                         => 'thinkup_font_bodystandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_bodyswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for body text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for body text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				'id'                         => 'thinkup_font_bodygoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_bodyswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Body Headings', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_bodyheadingswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for header text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for header text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				'id'                         => 'thinkup_font_bodyheadingstandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_bodyheadingswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for header text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for header text.<br />This will <strong>NOT</strong> affect text in header or footer areas.', 'redux-framework'),
				'id'                         => 'thinkup_font_bodyheadinggoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_bodyheadingswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Site Title (Logo)', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_logoswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),
				
			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for logo text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for logo text.', 'redux-framework'),
				'id'                         => 'thinkup_font_logostandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_logoswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for header text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for header text.', 'redux-framework'),
				'id'                         => 'thinkup_font_logogoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_logoswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Pre Header Menu', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_preheaderswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for pre header text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for pre header text.', 'redux-framework'),
				'id'                         => 'thinkup_font_preheaderstandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_preheaderswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for pre header text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for pre header text.', 'redux-framework'),
				'id'                         => 'thinkup_font_preheadergoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Main Header Menu', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_mainheaderswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for main header text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for main header text.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainheaderstandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_mainheaderswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for main header text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for main header text.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainheadergoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_mainheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Footer Headings', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_footerheadingswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for body text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for body text.', 'redux-framework'),
				'id'                         => 'thinkup_font_footerheadingstandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_footerheadingswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for body text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for body text.', 'redux-framework'),
				'id'                         => 'thinkup_font_footerheadinggoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_footerheadingswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Main Footer', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_mainfooterswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for footer text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for footer text.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainfooterstandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_mainfooterswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for footer text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for footer text.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainfootergoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_mainfooterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'   => __('Post Footer', 'redux-framework'), 
				'desc'    => __('Check to use Google fonts.', 'redux-framework'),
				'id'      => 'thinkup_font_postfooterswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Standard Font" for post footer text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Standard Font" for post footer text.', 'redux-framework'),
				'id'                         => 'thinkup_font_postfooterstandard',
				'type'                       => 'select',
				'data'                       => 'standardfont',
				'required'                   => array( 
					array( 'thinkup_font_postfooterswitch', '!=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Select a "Google Font" for post footer text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select a "Google Font" for post footer text.', 'redux-framework'),
				'id'                         => 'thinkup_font_postfootergoogle',
				'type'                       => 'select',
				'data'                       => 'googlefont',
				'required'                   => array( 
					array( 'thinkup_font_postfooterswitch', '=', 
						array( '1' ),
					), 
				)
			),

            array(
                'id'                         => 'thinkup_section_font_size',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Control Font Size</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Control Font Size</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Body Font', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the body font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the body font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_bodysize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),

			array(
				'title'                      => __('H1 Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the h1 heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the h1 heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_h1size',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),

			array(
				'title'                      => __('H2 Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the h2 heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the h2 heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_h2size',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),

			array(
				'title'                      => __('H3 Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the h3 heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the h3 heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_h3size',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),

			array(
				'title'                      => __('H4 Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the h4 heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the h4 heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_h4size',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),

			array(
				'title'                      => __('H5 Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the h5 heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the h5 heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_h5size',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),

			array(
				'title'                      => __('H6 Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the h6 heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the h6 heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_h6size',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Sidebar Widget Heading', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the sidebar widget heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the sidebar widget heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_sidebarsize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Pre Header Menu', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the pre header font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the pre header font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_preheadersize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Pre Header Menu (Dropdown)', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the pre header dropdown font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the pre header dropdown font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_preheadersubsize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Main Header Menu', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the main header font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the main header font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainheadersize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Main Header Menu (Dropdown)', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the main header dropdown font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the main header dropdown font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainheadersubsize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Footer Headings', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the footer heading font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the footer heading font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_footerheadingsize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Main Footer', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the main footer font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the main footer font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_mainfootersize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				

			array(
				'title'                      => __('Post Footer', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the post footer font size.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the post footer font size.', 'redux-framework'),
				'id'                         => 'thinkup_font_postfootersize',
				'type'                       => 'select',
				'data'                       => 'fontsize',
			),				
		)
	) );	


	// -----------------------------------------------------------------------------------
	//	13.	Custom Styling
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Custom Styling', 'redux-framework'),
		'desc'       => __('<span class="redux-title">1 Click Color Change</span>', 'redux-framework'),
		'icon'       => 'el el-eye-open',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'   => __('Custom Color Scheme', 'redux-framework'), 
				'desc'    => __('Check to use custom theme color.', 'redux-framework'),
				'id'      => 'thinkup_styles_colorswitch',
				'type'    => 'checkbox',
				'default' => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Specify a custom theme color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify a custom theme color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_colorcustom',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
			),

            array(
                'id'                         => 'thinkup_section_styles_advanced',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Advanced Custom Styling</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Advanced Custom Styling</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Main Content', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable main content area styling.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable main content area styling.', 'redux-framework'),
				'id'                         => 'thinkup_styles_mainswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_mainbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_mainswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Headings (h1, h2, h3, etc...)', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Headings (h1, h2, h3, etc...)', 'redux-framework'),
				'id'                         => 'thinkup_styles_mainheading',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_mainswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Body text.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Body text.', 'redux-framework'),
				'id'                         => 'thinkup_styles_maintext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_mainswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Body links.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Body links.', 'redux-framework'),
				'id'                         => 'thinkup_styles_mainlink',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_mainswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Body links - Hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Body links - Hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_mainlinkhover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_mainswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'                      => __('Pre Header', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable custom pre-header styling.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable custom pre-header styling.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Background color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Background color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderbghover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheadertext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Text color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Text color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheadertexthover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderdropbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Background color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Background color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderdropbghover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderdroptext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Text color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Text color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderdroptexthover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Border color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Border color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_preheaderdropborder',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_preheaderswitch', '=', 
						array( '1' ),
					), 
				)
			),		

			array(
				'title'                      => __('Header', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable custom header styling.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable custom header styling.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Background color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Background color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerbghover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headertext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Text color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Text color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headertexthover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerdropbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Background color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Background color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerdropbghover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerdroptext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Text color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Text color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerdroptexthover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Border color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Border color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerdropborder',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerswitch', '=', 
						array( '1' ),
					), 
				)
			),							

			array(
				'title'                      => __('Header (Responsive)', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable custom responsive header styling.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable custom responsive header styling.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Top tier menu - Background color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Top tier menu - Background color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresbghover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresdropbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Background color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Background color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresdropbghover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresdroptext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Text color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Text color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresdroptexthover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),				

			array(
				$thinkup_subtitle_panel      => __('Dropdown menu - Border color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Dropdown menu - Border color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_headerresdropborder',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_headerresswitch', '=', 
						array( '1' ),
					), 
				)
			),			

			array(
				'title'                      => __('Footer', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable custom footer styling.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable custom footer styling.', 'redux-framework'),
				'id'                         => 'thinkup_styles_footerswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_footerbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_footerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Title color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Title color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_footertitle',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_footerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_footertext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_footerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Link color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Link color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_footerlink',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_footerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Link color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Link color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_footerlinkhover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_footerswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				'title'                      => __('Post-Footer', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Switch on to enable custom post-footer styling.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Switch on to enable custom post-footer styling.', 'redux-framework'),
				'id'                         => 'thinkup_styles_postfooterswitch',
				'type'                       => 'switch',
				'default'                    => '0',
			),

			array(
				$thinkup_subtitle_panel      => __('Background color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Background color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_postfooterbg',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_postfooterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Text color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Text color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_postfootertext',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_postfooterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Link color.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Link color.', 'redux-framework'),
				'id'                         => 'thinkup_styles_postfooterlink',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_postfooterswitch', '=', 
						array( '1' ),
					), 
				)
			),

			array(
				$thinkup_subtitle_panel      => __('Link color on hover.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Link color on hover.', 'redux-framework'),
				'id'                         => 'thinkup_styles_postfooterlinkhover',
				'type'                       => 'color',
				'validate'                   => 'color',
				'default'                    => '#FFFFFF',
				'required'                   => array( 
					array( 'thinkup_styles_postfooterswitch', '=', 
						array( '1' ),
					), 
				)
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	14.	WooCommerce
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('WooCommerce', 'redux-framework'),
		'desc'       => __('<span class="redux-title">WooCommerce Settings</span>', 'redux-framework'),
		'icon'       => 'el el-shopping-cart',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'                      => __('Enable Theme Specific Style', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable theme specific WooCommerce style.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable theme specific WooCommerce style.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_styleswitch',
				'type'                       => 'switch',
				'default'                    => '1',
			),

			array(
				'title'                      => __('Shop Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select shop page layout. This will only be applied to the main shop page and not individual products.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select shop page layout. This will only be applied to the main shop page and not individual products.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_layout',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'options'                    => array(
					'option1' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option01.png',
					'option2' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option02.png',
					'option3' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option03.png',
					'option4' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option04.png',
					'option5' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option05.png',
					'option6' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option06.png',
					'option7' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option07.png',
					'option8' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option08.png',
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_sidebars',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_woocommerce_layout', '=', 
						array( 'option5', 'option6', 'option7', 'option8' ),
					), 
				)
			),

			array(
				'title'                      => __('Products Per Page', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the number of products per page on the shop page.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the number of products per page on the shop page.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_countshop',
				'type'                       => 'select',
				'options'                    => array(
					'2'  => '2',
					'3'  => '3',
					'4'  => '4',
					'5'  => '5',
					'6'  => '6',
					'7'  => '7',
					'8'  => '8',
					'9'  => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12',
					'13' => '13',
					'14' => '14',
					'15' => '15',
					'16' => '16',
					'17' => '17',
					'18' => '18',
					'19' => '19',
					'20' => '20',
				),
			),

			array(
				'title'                      => __('Product Meta Content', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose which meta content to display on the shop page.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose which meta content to display on the shop page.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_contentcheck',
				'type'                       => 'checkbox',
				'options'                    => array(
					'option1' => 'Enable "Quick View".',
					'option2' => 'Enable lightbox.',
					'option3' => 'Enable likes.',
//					'option4' => 'Enable social sharing.',
				),
			),

			array(
				'title'                      => __('Product Excerpt', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable product excerpt.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable product excerpt.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_excerptshop',
				'type'                       => 'switch',
				'default'                    => '0',
			),

            array(
                'id'                         => 'thinkup_section_woo_products',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">WooCommerce Product Page</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">WooCommerce Product Page</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Product Page Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select page layout. This will only be applied to published Pages (I.e. Not posts, blog or home).', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select page layout. This will only be applied to published Pages (I.e. Not posts, blog or home).', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_layoutproduct',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'default'                    => '0',
				'options'                    => array(
					'option1' => ReduxFramework::$_url . 'assets/img/layout/blog/option01.png',
					'option2' => ReduxFramework::$_url . 'assets/img/layout/blog/option02.png',
					'option3' => ReduxFramework::$_url . 'assets/img/layout/blog/option03.png',
				),
			),

			array(
				'title'                      => __('Select a Sidebar', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a sidebar to use with the page layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a sidebar to use with the page layout.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_sidebarsproduct',
				'type'                       => 'select',
				'data'                       => 'sidebars',
				'required'                   => array( 
					array( 'thinkup_woocommerce_layoutproduct', '=', 
						array( 'option2', 'option3' ),
					), 
				)
			),

			array(
				'title'                      => __('Meta Content', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose which meta content to display on the product page.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose which meta content to display on the product page.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_contentcheckproduct',
				'type'                       => 'checkbox',
				'options'                    => array(
					'option1' => 'Enable likes.',
//					'option2' => 'Enable social sharing.',
					),
				),

			array(
				'title'                      => __('Variation Style', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose a variation style.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose a variation style.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_variation',
				'type'                       => 'radio',
				'options'                    => array( 
					'option1' => 'Dropdown', 
					'option2' => 'Buttons',
				),
			),

			array(
				'title'   => __('Hide Variation Title', 'redux-framework'), 
				'desc'    => __('Check to hide variation titles.', 'redux-framework'),
				'id'      => 'thinkup_woocommerce_variationtitle',
				'type'    => 'checkbox',
				'default' => '0',
			),

            array(
                'id'                         => 'thinkup_section_woo_products',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">WooCommerce Product Page - Related Products</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">WooCommerce Product Page - Related Products</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Related Products Layout', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Select related products layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Select related products layout.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_layoutrelated',
				'type'                       => 'image_select',
				'compiler'                   => true,
				'options'                    => array(
					'option1' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option02.png',
					'option2' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option03.png',
					'option3' => ReduxFramework::$_url . 'assets/img/layout/portfolio/option04.png',
				),
			),

			array(
				'title'                      => __('Number of Related Products', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Specify the number of related products to be shown on the products layout.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Specify the number of related products to be shown on the products layout.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_countrelated',
				'type'                       => 'select',
				'options'                    => array(
					'2'  => '2',
					'3'  => '3',
					'4'  => '4',
					'5'  => '5',
					'6'  => '6',
					'7'  => '7',
					'8'  => '8',
					'9'  => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12',
				),
			),

			array(
				'title'                      => __('Product Meta Content', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Choose which meta content to display for the related products.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Choose which meta content to display for the related products.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_contentcheckrelated',
				'type'                       => 'checkbox',
				'options'                    => array(
					'option1' => 'Enable "Quick View".',
					'option2' => 'Enable lightbox.',
					'option3' => 'Enable likes.',
//					'option4' => 'Enable social sharing.',
				),
			),

			array(
				'title'                      => __('Product Excerpt', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Check to enable product excerpt.', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Check to enable product excerpt.', 'redux-framework'),
				'id'                         => 'thinkup_woocommerce_excerptrelated',
				'type'                       => 'switch',
				'default'                    => '0',
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	14.	Translation
	// -----------------------------------------------------------------------------------

	Redux::setSection( $opt_name, array(
		'title'      => __('Translation', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Blog Page</span>', 'redux-framework'),
		'icon'       => 'el el-quotes',
		'icon_class' => '',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

			array(
				'title'                      => __('Read More Button', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Leave blank to show default: "Read More".', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Leave blank to show default: "Read More".', 'redux-framework'),
				'id'                         => 'thinkup_translate_blogreadmore',
				'type'                       => 'text',
				'validate'                   => 'no_html',
			),

            array(
                'id'                         => 'thinkup_section_translate_contact',
                'type'                       => $thinkup_section_field,
                'title'                      => __( ' ', 'redux-framework' ),
				$thinkup_subtitle_panel      => __('<span class="redux-title">Template - Contact</span>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Template - Contact</span>', 'redux-framework'),
                'indent'                     => false,
            ),

			array(
				'title'                      => __('Contact Form Title', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Leave blank to show default: "Contact Form".', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Leave blank to show default: "Contact Form".', 'redux-framework'),
				'id'                         => 'thinkup_translate_contactformtitle',
				'type'                       => 'text',
				'validate'                   => 'no_html',
			),

			array(
				'title'                      => __('Contact Address Title', 'redux-framework'), 
				$thinkup_subtitle_panel      => __('Leave blank to show default: "Contact Address".', 'redux-framework'),
				$thinkup_subtitle_customizer => __('Leave blank to show default: "Contact Address".', 'redux-framework'),
				'id'                         => 'thinkup_translate_contactaddresstitle',
				'type'                       => 'text',
				'validate'                   => 'no_html',
			),
		)
	) );


	// -----------------------------------------------------------------------------------
	//	15.	Support
	// -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
		'title'      => __('Support', 'redux-framework'),
		'desc'       => __('<span class="redux-title">Documentation</span><p>We&#39;ve produced a detailed demo of each theme where most of the common questions can be found such as how to use shortcodes and setup basic page layouts. To find out more visit us at <a href="http://www.thinkupthemes.com/" target="_blank">www.thinkupthemes.com</a> and check the information pages of the demo theme your using.</p><p>This theme also comes with a detailed user manual which should help answer all your common questions.</p>', 'redux-framework'),
		'icon'       => 'el el-user',
		'icon_class' => '',
        'id'         => 'thinkup_section_support',
        'subsection' => $thinkup_customizer_subsection,
        'customizer' => false,
		'fields'     => array(

            array(
                'id'                         => 'thinkup_section_support_info',
                'type'                       => $thinkup_section_field,
				$thinkup_subtitle_panel      => __('<span class="redux-title">Ticket Support</span><p>Don&#39;t panic! If you can&#39;t find the answer in the theme documentation then please submit a support ticket. These tickets are dealt with by the guys that built the theme so will definitely be able to help!</p><p>Just submit a support ticket at <a href="http://www.thinkupthemes.com/support/" target="_blank">www.thinkupthemes.com/support</a></p>', 'redux-framework'),
				$thinkup_subtitle_customizer => __('<span class="redux-title">Ticket Support</span><p>Don&#39;t panic! If you can&#39;t find the answer in the theme documentation then please submit a support ticket. These tickets are dealt with by the guys that built the theme so will definitely be able to help!</p><p>Just submit a support ticket at <a href="http://www.thinkupthemes.com/support/" target="_blank">www.thinkupthemes.com/support</a></p>', 'redux-framework'),
                'indent'                     => false,
            ),
		)
	) );

    Redux::setSection( $opt_name, array(
		'type' => 'divide',
	) );


    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=> true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

