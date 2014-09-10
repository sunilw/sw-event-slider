<?php

/**
 *  Plugin Name:           SW Events Slider
 * Plugin URI:                 http://github.com/sunilw/sw-event-slider
 * Description:              Present a  slideshow based on a  list of events. Depends on Event Calendar by Modern Tribe
 * Version:                       0.10
 * Author:                        Sunil Williams
 * Author URI:                http://sunil.co.nz
 * License URI:               http://www.gnu.org/licenses/gpl-2.0.text
 *
 */

/**
/* initialize
*/

if (!defined('WPINC')) {
    die ;
}

if (!defined("SW_EVENTS_SLIDER")) {
    define("SW_EVENTS_SLIDER",  "sw-events-slider" ) ;
}

if (!defined("SW_EVENTS_SLIDER_DIR")) {
    define("SW_EVENTS_SLIDER_DIR",  WP_PLUGIN_DIR . '/'  . SW_EVENTS_SLIDER ) ;
}

if (!defined("SW_EVENTS_SLIDER_URL")) {
    define("SW_EVENTS_SLIDER_URL",  WP_PLUGIN_URL . '/'  . SW_EVENTS_SLIDER ) ;
}

/**
 *  enqueue our assets
 */


function sw_slider_scripts()
{
    wp_enqueue_script( 'cycle', '//cdns.cloudflare.com/libs/jquery.cycle/3.0.3/jquery.cycle.min.all.js') ;
}
add_action( 'wp_enqueue_scripts', 'sw_slider_scripts' ) ;

function sw_slideshow() {
    $out = include_once("loops/slideshow.php") ;
    echo $out ;
}

class Sw_Events_Slider extends WP_WIDGET {

    function __construct()
    {
        parent::__construct(
            // base ID
            'sw_events_slider_widget',
            // name
            __('sw_events_slider_widget', 'sw events slider'),
            // description
            array(
                'description'  => __('Slideshow of events based taken from Events Calendar plugin')
            )  //ends description
        ) ;
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']) ;
        echo($args['before_widget']) ;

        if (!empty($title)) {
            echo($args['before_title']) . $title  . $args['after_title'] ;
        }

        // run code, display output
        echo __('hello from my widget!', 'sw_events_slider_widget_domain') ;
    }
}

// register and load widget
function  load_sw_events_slider()
{
    register_widget('Sw_Events_Slider') ;
}
add_action('widgets_init', 'load_sw_events_slider') ;