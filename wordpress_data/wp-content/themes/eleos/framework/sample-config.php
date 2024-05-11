<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "eleos_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'eleos_option',
        'use_cdn' => TRUE,
        'display_name'     => $theme->get('Name'),
        'display_version'  => $theme->get('Version'),
        'page_title' => 'Eleos Options',
        'update_notice' => FALSE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Eleos Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'dev_mode'   => false,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'page_priority' => 90,
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'eleos' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'eleos' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'eleos' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'eleos' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'eleos' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    // ACTUAL DECLARATION OF SECTIONS          
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-stackoverflow',
        'title' => esc_html__('General Settings', 'eleos'),
        'fields' => array(
            array(
                'id'       => 'animate-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Animated Off?', 'eleos'),
                'subtitle' => esc_html__('Look, it\'s on!', 'eleos'),
                'default'  => true,
            ), 
            array(
                'id' => 'gmap_api',
                'type' => 'text',
                'title' => esc_html__('Google Map API Key', 'eleos'),
                'subtitle' => esc_html__('Add your Google map api key', 'eleos'),
                'desc' => esc_html__('Create your Gmap API key here: https://developers.google.com/maps/documentation/javascript/', 'eleos'),
                'default' => 'AIzaSyDZJDaC3vVJjxIi2QHgdctp3Acq8UR2Fgk'
            ), 
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-repeat',
        'title' => esc_html__('Preload Settings', 'eleos'),
        'fields' => array( 
            array(
                'id' => 'show_pre',
                'type' => 'select',
                'title' => esc_html__('Show Preload?', 'eleos'),
                'subtitle' => esc_html__('Option Show Preload', 'eleos'),
                'desc' => esc_html__('', 'eleos'),
                'options'  => array(
                    'yes' => 'Yes',
                    'no'  => 'No',
                ),
                'default' => 'yes',
            ),   
            array(
                'id' => 'textpre',
                'type' => 'text',
                'title' => esc_html__('Text preload', 'eleos'),
                'subtitle' => esc_html__('Add text for the preload (default: your digital solution).', 'eleos'),
                'default' => 'your digital solution',
            ),    
            array(
                'id' => 'textcolor',
                'type' => 'color',
                'title' => esc_html__('text color preload', 'eleos'),
                'subtitle' => esc_html__('Pick the color for the preload text  (default: #414141).', 'eleos'),
                'default' => '#414141',
                'validate' => 'color',
            ),    
            array(
                'id' => 'bgpreload',
                'type' => 'color',
                'title' => esc_html__('background preload', 'eleos'),
                'subtitle' => esc_html__('Pick the color for the preload background  (default: #fff).', 'eleos'),
                'default' => '#fff',
                'validate' => 'color',
            ),      
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-picture',
        'title' => esc_html__('Logo & Favicon Settings', 'eleos'),
        'fields' => array(
            array(
                'id' => 'favicon',
                'type' => 'media',                
                'title' => esc_html__('Favicon', 'eleos'),
                'compiler' => 'true',     
                'url' => false,           
                'desc' => esc_html__('Favicon.', 'eleos'),
                'subtitle' => esc_html__('Favicon', 'eleos'),
                'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),                     
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'title' => esc_html__('Logo Static', 'eleos'),
                'compiler' => 'true',   
                'url' => false,             
                'desc' => esc_html__('logo.', 'eleos'),
                'subtitle' => esc_html__('Logo', 'eleos'),
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),                     
            ),        
            array(
                'id'   =>'divider_1',
                'desc' => esc_html__('Please fixed Width & Height & Top for Logo display on static devices.', 'eleos'),
                'type' => 'divide'
            ), 
            array(
                'id' => 'widthlg',
                'type' => 'text',
                'title' => esc_html__('Fix Width Logo static, Default: 134', 'eleos'),
                'subtitle' => esc_html__('Input Width Logo, remember enter number.', 'eleos'),
                'default' => '134'
            ),  
            array(
                'id' => 'heightlg',
                'type' => 'text',
                'title' => esc_html__('Fix Height Logo static, Default: 25', 'eleos'),
                'subtitle' => esc_html__('Input Height Logo, remember enter number.', 'eleos'),
                'default' => '25'
            ),         
            array(
                'id' => 'toplg',
                'type' => 'text',
                'title' => esc_html__('Fix top Logo static, Default: 50', 'eleos'),
                'subtitle' => esc_html__('Input top Logo, remember enter number.', 'eleos'),
                'default' => '50'
            ),          
            array(
                'id'   =>'divider_2',
                'desc' => esc_html__('Please fixed Width & Height & Top for Logo display on scroll devices.', 'eleos'),
                'type' => 'divide'
            ),
            array(
                'id' => 'widthlg_scroll',
                'type' => 'text',
                'title' => esc_html__('Fix Width Logo scroll, Default: 86', 'eleos'),
                'subtitle' => esc_html__('Input Width Logo, remember enter number.', 'eleos'),
                'default' => '86'
            ),  
            array(
                'id' => 'heightlg_scroll',
                'type' => 'text',
                'title' => esc_html__('Fix Height Logo Scroll, Default: 16', 'eleos'),
                'subtitle' => esc_html__('Input Height Logo, remember enter number.', 'eleos'),
                'default' => '16'
            ),         
            array(
                'id' => 'toplg_scroll',
                'type' => 'text',
                'title' => esc_html__('Fix top Logo scroll, Default: 32', 'eleos'),
                'subtitle' => esc_html__('Input top Logo, remember enter number.', 'eleos'),
                'default' => '32'
            ),     
            array(
                'id'   =>'divider_3',
                'desc' => esc_html__('Please fixed Width & Height & Top for Logo display on mobile devices.', 'eleos'),
                'type' => 'divide'
            ),
            array(
                'id' => 'widthlg_mobie',
                'type' => 'text',
                'title' => esc_html__('Fix Width Logo scroll, Default: 80', 'eleos'),
                'subtitle' => esc_html__('Input Width Logo, remember enter number.', 'eleos'),
                'default' => '80'
            ),  
            array(
                'id' => 'heightlg_mobie',
                'type' => 'text',
                'title' => esc_html__('Fix Height Logo Scroll, Default: 15', 'eleos'),
                'subtitle' => esc_html__('Input Height Logo, remember enter number.', 'eleos'),
                'default' => '15'
            ),         
            array(
                'id' => 'toplg_mobie',
                'type' => 'text',
                'title' => esc_html__('Fix top Logo scroll, Default: 30', 'eleos'),
                'subtitle' => esc_html__('Input top Logo, remember enter number.', 'eleos'),
                'default' => '30'
            ),
            array(
                'id' => 'apple_icon',
                'type' => 'media',
                'title' => esc_html__('Apple Touch Icon 57x57', 'eleos'),
                'compiler' => 'true',   
                'url' => false,             
                'desc' => esc_html__('Upload your Apple touch icon 57x57.', 'eleos'),
                'subtitle' => esc_html__('', 'eleos'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon.png'),
            ),                  
            array(
                'id' => 'apple_icon_72',
                'type' => 'media',
                'title' => esc_html__('Apple Touch Icon 72x72', 'eleos'),
                'compiler' => 'true',   
                'url' => false,             
                'desc' => esc_html__('Upload your Apple touch icon 72x72.', 'eleos'),
                'subtitle' => esc_html__('', 'eleos'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-72x72.png'),
            ),
            array(
                'id' => 'apple_icon_114',
                'type' => 'media',
                'title' => esc_html__('Apple Touch Icon 114x114', 'eleos'),
                'compiler' => 'true', 
                'url' => false,               
                'desc' => esc_html__('Upload your Apple touch icon 114x114.', 'eleos'),
                'subtitle' => esc_html__('', 'eleos'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-114x114.png'),
            ),                                        
        )
    ) ); 

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-group',
        'title' => esc_html__('Social Settings', 'eleos'),
        'fields' => array(
            array(
                'id' => 'facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook Url', 'eleos'),                
                'default' => 'https://www.facebook.com/',
            ),
            array(
                'id' => 'google',
                'type' => 'text',
                'title' => esc_html__('Google+ Url', 'eleos'),                
                'default' => 'https://plus.google.com',
            ),
            array(
                'id' => 'twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter Url', 'eleos'),                
                'default' => 'https://twitter.com/',
            ),
            array(
                'id' => 'youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube Url', 'eleos'),                
                'default' => 'https://youtube.com/',
            ),
            array(
                'id' => 'linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin Url', 'eleos'),                
                'default' => 'https://www.linkedin.com/',
            ),
            array(
                'id' => 'dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble Url', 'eleos'),                
                'default' => 'https://www.dribbble.com/',
            ),
            array(
                'id' => 'pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest Url', 'eleos'),                
                'default' => 'https://www.pinterest.com/',
            ),                    
            array(
                'id' => 'instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram Url', 'eleos'),                
                'default' => 'https://www.instagram.com/',
            ),
            array(
                'id' => 'skype',
                'type' => 'text',
                'title' => esc_html__('Skype Url', 'eleos'),                
                'default' => ''
            ),         
            array(
                'id' => 'github',
                'type' => 'text',
                'title' => esc_html__('Github Url', 'eleos'),                
                'default' => ''
            ),  
            array(
                'id' => 'vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo Url', 'eleos'),                
                'default' => ''
            ),  
            array(
                'id' => 'tumblr',
                'type' => 'text',
                'title' => esc_html__('tumblr Url', 'eleos'),                
                'default' => ''
            ),  
            array(
                'id' => 'soundcloud',
                'type' => 'text',
                'title' => esc_html__('soundcloud Url', 'eleos'),                
                'default' => ''
            ),  
            array(
                'id' => 'behance',
                'type' => 'text',
                'title' => esc_html__('behance Url', 'eleos'),                
                'default' => ''
            ),  
            array(
                'id' => 'lastfm',
                'type' => 'text',
                'title' => esc_html__('lastfm Url', 'eleos'),                
                'default' => ''
            ),  
            array(
                'id' => 'vk',
                'type' => 'text',
                'title' => esc_html__('Vk Url', 'eleos'),            
                'default' => ''
            ),                    
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-blogger',
        'title' => esc_html__('Blog Settings', 'eleos'),
        'fields' => array(
            array(
                'id' => 'blog_excerpt',
                'type' => 'text',
                'title' => esc_html__('Blog custom excerpt lenght', 'eleos'),
                'subtitle' => esc_html__('Input Blog custom excerpt lenght', 'eleos'),
                'desc' => esc_html__('Blog custom excerpt lenght', 'eleos'),
                'default' => '20'
            ),      
         )
    ) );     
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-credit-card',
        'title' => esc_html__('Footer Settings', 'eleos'),
        'fields' => array(                      
            array(
                'id' => 'footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'eleos'),
                'subtitle' => esc_html__('Copyright Text', 'eleos'),
                'default' => 'Copyright 2018 - Eleos by OceanThemes',
            ),              
            array(
                'id' => 'bgfooter',
                'type' => 'media',
                'title' => esc_html__('Logo Footer', 'eleos'),
                'compiler' => 'true',   
                'url' => false,             
                'desc' => esc_html__('Upload logo.', 'eleos'),
                'subtitle' => esc_html__('Logo footer', 'eleos'),
                'default' => '',                     
            ),                      
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-website',
        'title' => esc_html__('Styling Options', 'eleos'),
        'fields' => array(                        
            array(
                'id' => 'main-color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color', 'eleos'),
                'subtitle' => esc_html__('Pick the main color for the theme (default: #cfa144).', 'eleos'),
                'default' => '#cfa144',
                'validate' => 'color',
            ),                      
            array(
                'id' => 'bghead',
                'type' => 'color',
                'title' => esc_html__('background header static', 'eleos'),
                'subtitle' => esc_html__('Pick the main color for the theme (default: #f7f7f7).', 'eleos'),
                'default' => '#f7f7f7',
                'validate' => 'color',
            ), 
            array(
                'id' => 'bghead_scroll',
                'type' => 'color',
                'title' => esc_html__('background header scroll', 'eleos'),
                'subtitle' => esc_html__('Pick the main color for the theme (default: #f7f7f7).', 'eleos'),
                'default' => '#f7f7f7',
                'validate' => 'color',
            ),  
            array(
                'id' => 'menu_color',
                'type' => 'color',
                'title' => esc_html__('Menu item color', 'eleos'),
                'subtitle' => esc_html__('Pick the main color for the theme (default: #111111).', 'eleos'),
                'default' => '#111111',
                'validate' => 'color',
            ),                    
            array(
                'id' => 'custom-css',
                'type' => 'ace_editor',
                'title' => esc_html__('CSS Code', 'eleos'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'eleos'),
                'mode' => 'css',
                'theme' => 'monokai',
                'desc' => 'Possible modes can be found at http://ace.c9.io/.',
                'default' => ""
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
