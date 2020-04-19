<?php
/**
 * Widget handler
 */
namespace WBFY\EasyIconGrid;

use WP_Widget;

defined('ABSPATH') || exit;

class Widget extends WP_Widget
{
    private $content = array();

    /***
     * Set widget info
     */
    public function __construct()
    {
        parent::__construct(
            'easy_icon_grid',
            __('Easy Icon Grid', 'easy-icon-grid'),
            array(
                'description' => __('Add an icon grid', 'easy-icon-grid'),
            )
        );
    }

    /**
     * Initialise and register widget
     */
    public function init()
    {
        register_widget($this);
    }

    /**
     * Show widget content
     *
     * @param array $args passed from the WP_Widget parent
     * @param array $instance content for instance from parent
     */
    public function widget($args, $instance)
    {
        if (empty($instance)) {
            $instance = Grid::default_props();
        }
        echo Grid::render($instance);
    }

    /**
     * Widget form
     *
     * @param array $instance content for instance from parent
     */
    public function form($instance)
    {
        // Add widget color picker
        wp_enqueue_script(
            'easy-icon-grid-widget-js',
            plugins_url('/easy-icon-grid/assets/js/easy-icon-grid-widget.min.js'),
            array('wp-color-picker'), false, true
        );
        wp_enqueue_style('wp-color-picker');

        if (!$instance) {
            $instance = Grid::default_props();
        }

        echo Templates::render(
            'widget.php',
            array(
                'settings' => Settings::instance(),
                'content'  => $instance,
                'widget'   => $this,
            )
        );
    }

    /**
     * Parse and update widget contents
     *
     * @param array $updated updated widget content
     * @param array $old old widget content
     * @return array $new new widget content from form input
     */
    public function update($updated, $old)
    {
        echo 'update';
        $new = Grid::default_props();

        if (isset($updated['title'])) {
            $new['title'] = sanitize_text_field($updated['title']);
        }

        if (isset($updated['title_align'])) {
            $new['title_align'] = sanitize_text_field($updated['title_align']);
        }

        if (isset($updated['title_tag'])) {
            $new['title_tag'] = sanitize_text_field($updated['title_tag']);
        }

        if (isset($updated['icon_color'])) {
            $new['icon_color'] = sanitize_text_field($updated['icon_color']);
        }

        if (isset($updated['icon_size'])) {
            $new['icon_size'] = sanitize_text_field($updated['icon_size']);
        }

        if (isset($updated['max_cols'])) {
            $new['max_cols'] = sanitize_text_field($updated['max_cols']);
        }

        for ($i = 1; $i <= MAX_ITEMS; $i++) {
            if (isset($updated['item' . $i . '_icon'])) {
                $new['item' . $i . '_icon'] = sanitize_text_field($updated['item' . $i . '_icon']);
            }

            if (isset($updated['item' . $i . '_text'])) {
                $new['item' . $i . '_text'] = sanitize_text_field($updated['item' . $i . '_text']);
            }
        }
        return $new;
    }
}
