<?php
/**
 * Shortcode handler
 */
namespace WBFY\EasyIconGrid;

defined('ABSPATH') || exit;

class Shortcode
{
    private $content = array();

    /**
     * Initialise shortcodes
     */
    public function init()
    {
        add_shortcode('easy_icon_grid', array($this, 'easy_icon_grid'));
    }

    /**
     * Handle easy_icon_grid shortcode and display grid
     *
     * @param array $attrs input attributes from shortcode
     * @return string generated grid html
     */
    public function easy_icon_grid($attrs)
    {
        $params = Grid::default_props();

        if (!empty($attrs['title'])) {
            $params['title'] = $attrs['title'];
        }

        if (!empty($attrs['title_align'])) {
            $params['title_align'] = $attrs['title_align'];
        }

        if (!empty($attrs['title_tag'])) {
            $params['title_tag'] = $attrs['title_tag'];
        }

        if (!empty($attrs['icon_color'])) {
            $params['icon_color'] = $attrs['icon_color'];
        }

        if (!empty($attrs['icon_size'])) {
            $params['icon_size'] = $attrs['icon_size'];
        }

        if (!empty($attrs['max_cols'])) {
            $params['max_cols'] = $attrs['max_cols'];
        }

        for ($i = 1; $i <= MAX_ITEMS; $i++) {
            if (!empty($attrs['icon' . $i])) {
                $params['item' . $i . '_icon'] = $attrs['icon' . $i];
            }
            if (!empty($attrs['text' . $i])) {
                $params['item' . $i . '_text'] = $attrs['text' . $i];
            }
        }
        return Grid::render($params);
    }
}
