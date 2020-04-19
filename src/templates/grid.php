<?php
/**
 * Template for grid html
 * Used by shortcode and widget
 */
namespace WBFY\EasyIconGrid;

defined('ABSPATH') || exit;

$html  = '<div class="easy-icon-grid">';
$align = 'eig-' . esc_attr($data['content']['title_align']);
if (!empty($data['content']['title'])) {
    $html .= '<' . esc_attr($data['content']['title_tag']) . ' class="' . $align . '">';
    $html .= esc_html($data['content']['title']);
    $html .= '</' . esc_attr($data['content']['title_tag']) . '>';
}

$icon_list = '';
$icon_size = 'eig-' . esc_attr($data['content']['icon_size']);
$max_cols  = 'eig-cols-' . esc_attr($data['content']['max_cols']);
for ($i = 1; $i <= MAX_ITEMS; $i++) {
    if (!empty($data['content']['item' . $i . '_icon'])) {
        $icon_class = esc_attr($data['settings']->font['class_prefix']) . esc_attr($data['content']['item' . $i . '_icon']);

        $icon_list .= '<li class="' . esc_attr($max_cols) . '">';
        $icon_list .= '<div class="eig-icon" style="color:' . esc_attr($data['content']['icon_color']) . '">';
        $icon_list .= '<span class="' . esc_attr($icon_class) . ' ' . esc_attr($icon_size) . '"></span>';
        $icon_list .= '</div>';
        $icon_list .= '<div class="eig-text">';
        $icon_list .= esc_html($data['content']['item' . $i . '_text']);
        $icon_list .= '</div></li>';
    }
}
$html .= (!empty($icon_list)) ? '<ul class="eig-grid ' . $align . '">' . $icon_list . '</ul>' : '';

$html .= '</div>';
echo $html;
