<?php
/*
Plugin Name: Horizontal Rule Widget
Description: This plugin allow you to insert horizontal rule on widget.
Author: Takayuki Miyauchi
Version: 1.0.0
Author URI: http://wpist.me/
Plugin URI: http://wpist.me/
Domain Path: /languages
Text Domain: hr-widget
*/


class hrWidget extends WP_Widget {

    private $num = 5;

    function __construct() {
		$widget_ops = array(
            'description' => __(
                'Insert horizontal rule.',
                'hr-widget'
            )
        );
		$control_ops = array();
        parent::__construct(
            false,
            __('Horizontal Rule', 'hr-widget'),
            $widget_ops,
            $control_ops
        );
    }

    public function widget($args, $instance) {

        echo $args['before_widget'];
        echo '<hr />';
        echo $args['after_widget'];
    }
}

class hrWidgetInit {

function __construct()
{
    add_action('widgets_init', array(&$this, "widgets_init"));
    add_action("plugins_loaded", array(&$this, "plugins_loaded"));
}

public function widgets_init()
{
    return register_widget("hrWidget");
}

public function plugins_loaded()
{
    load_plugin_textdomain(
        "hr-widget",
        false,
        dirname(plugin_basename(__FILE__)).'/languages'
    );
}

}

new hrWidgetInit();


// EOF
