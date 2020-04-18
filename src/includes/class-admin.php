<?php
namespace WBFY\EasyIconGrid;

defined('ABSPATH') || exit;

class Admin
{
    /**
     * Initialise Easy Icon Grid settings page
     * Set up actions and filters for Admin functions
     */
    public function init()
    {
        register_setting(
            'easy_icon_grid_settings', // Option group.
            'easy_icon_grid', // Option name (in wp_settings)
            array($this, 'validate') // Sanitation callback
        );
        add_filter('plugin_action_links_easy-icon-grid/easy-icon-grid.php', array($this, 'plugin_admin_settings_link'));
        $this->register_settings_form();
    }

    /**
     * Add 'settings' link onto WP Plugins page
     *
     * @param array  $links links for WP Plugins page
     * @return array $links With new Settings link added
     */
    public function plugin_admin_settings_link($links)
    {
        $url = esc_url(
            add_query_arg(
                'page',
                'easy-icon-grid',
                get_admin_url() . 'options-general.php'
            )
        );
        $settings_link = "<a href='$url'>" . __('Settings', 'easy-icon-grid') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    /**
     * Add Easy Icon Grid to settings menu
     */
    public function settings_menu_link()
    {
        add_options_page(
            __('Easy Icon Grid', 'easy-icon-grid'), // Page title
            __('Easy Icon Grid', 'easy-icon-grid'), // Menu title
            'manage_options', // Capability/permission required
            'easy-icon-grid', // Page slug (unique id)
            array($this, 'render') // Renderer callback
        );
    }

    /**
     * Add form and settings
     */
    private function register_settings_form()
    {
        // Font settings section
        add_settings_section(
            'easy_icon_grid_font',
            __('Icon Font', 'easy-icon-grid'),
            array($this, 'font_section_header'),
            'easy_icon_grid_settings'
        );

        add_settings_field(
            'easy_icon_grid_font_url',
            __('URL', 'easy-icon-grid'),
            array($this, 'font_url_field'),
            'easy_icon_grid_settings',
            'easy_icon_grid_font'
        );

        add_settings_field(
            'easy_icon_grid_font_class_prefix',
            __('Icon Class Prefix', 'easy-icon-grid'),
            array($this, 'font_class_prefix_field'),
            'easy_icon_grid_settings',
            'easy_icon_grid_font'
        );

        // Config data settings fields
        add_settings_section(
            'easy_icon_grid_config_data',
            __('Configuration Data', 'easy-icon-grid'),
            array($this, 'config_data_section_header'),
            'easy_icon_grid_settings'
        );

        add_settings_field(
            'easy_icon_grid_config_data_on_deactivate',
            __('Deactivated', 'easy-icon-grid'),
            array($this, 'config_data_on_deactivate_field'),
            'easy_icon_grid_settings',
            'easy_icon_grid_config_data'
        );

        add_settings_field(
            'easy_icon_grid_config_data_on_delete',
            __('Deleted', 'easy-icon-grid'),
            array($this, 'config_data_on_delete_field'),
            'easy_icon_grid_settings',
            'easy_icon_grid_config_data'
        );
    }

    /**
     * Render icon font settings section header
     */
    public function font_section_header()
    {
        echo '<div>';
        _e('The default icon font used is font-awesome.', 'easy-icon-grid');
        echo '</div>';
        echo '<div>';
        echo '<a href="https://fontawesome.com/v5.13.0/icons/" target="_blank">';
        _e('View font-awesome Icons', 'easy-icon-grid');
        echo '</a>';
        echo '</div>';
        echo '<p>';
        _e("In most situations the default Icon Font settings will be fine.", 'easy-icon-grid');
        echo '</p>';
    }

    /**
     * Render font url field
     */
    public function font_url_field()
    {
        $settings = Settings::instance();

        echo Html::input_text(
            array(
                'id'        => 'easy_icon_grid_font_url',
                'name'      => 'easy_icon_grid[font][url]',
                'maxlength' => '150',
                'size'      => '80',
                'value'     => $settings->font['url'],
            )
        );
        echo '<div>';
        _e('Easy Icon Grid uses an icon font to display the icons in the grid.', 'easy-icon-grid');
        echo '</div>';
        echo '<div>';
        _e('The URL field is used to set where it is downloaded from.', 'easy-icon-grid');
        echo '</div>';
        echo '<div>';
        _e('Its smart enough to distinguish between scripts and css.', 'easy-icon-grid');
        echo '</div>';
    }

    /**
     * Render font class_prefix field
     */
    public function font_class_prefix_field()
    {
        $settings = Settings::instance();

        echo Html::input_text(
            array(
                'id'        => 'easy_icon_grid_font_class_prefix',
                'name'      => 'easy_icon_grid[font][class_prefix]',
                'maxlength' => '150',
                'size'      => '80',
                'value'     => $settings->font['class_prefix'],
            )
        );

        echo '<div>';
        _e('When you set the icon font class name for each icon in a grid, it often has a prefix.', 'easy-icon-grid');
        echo '</div>';
        echo '<div>';
        _e('The Icon Class Prefix field is used to set this.', 'easy-icon-grid');
        echo '</div>';
        echo '<div>';
        _e("For example, with the default font-awesome the prefix is 'fas fa-'.", 'easy-icon-grid');
        echo '</div>';
        echo '<div>';
        _e("If you than set the icon font class for an individual to 'snowflake' then the final class(es) used will be 'fas fa-snowflake' as required by the icon font definittion.", 'easy-icon-grid');
        echo '</div>';
    }

    /**
     * Render config data settings header
     */
    public function config_data_section_header()
    {
        echo '<p>' . __('Remove all configuration data for this plugin when it is:', 'easy-icon-grid') . '</p>';
    }

    /**
     * Render config data on_deactivate field
     */
    public function config_data_on_deactivate_field()
    {
        $settings = Settings::instance();

        echo Html::input_check(
            array(
                'id'    => 'easy_icon_grid_config_data_on_deactivate',
                'name'  => 'easy_icon_grid[config_data][on_deactivate]',
                'value' => $settings->config_data['on_deactivate'],
            )
        );
    }

    /**
     * Render config_data on_delete/uninstall field
     */
    public function config_data_on_delete_field()
    {
        $settings = Settings::instance();

        echo Html::input_check(
            array(
                'id'    => 'easy_icon_grid_config_data_on_delete',
                'name'  => 'easy_icon_grid[config_data][on_delete]',
                'value' => $settings->config_data['on_delete'],
            )
        );
    }

    /**
     * Validate and sanitize inputs
     */
    public function validate($input)
    {
        $input['config_data']['on_deactivate'] = (isset($input['config_data']['on_deactivate'])) ? true : false;
        $input['config_data']['on_delete']     = (isset($input['config_data']['on_delete'])) ? true : false;

        $input['font']['url'] = esc_url_raw($input['font']['url']);

        return $input;
    }

    /**
     * Render settings page from templates/settings.php
     */
    public function render()
    {
        if (!current_user_can('update_plugins')) {
            wp_die(__('You do not have sufficient permissions to access this page.', 'easy-icon-grid'));
        }

        wp_enqueue_style(
            'easy-icon-grid-css',
            plugins_url('/easy-icon-grid/assets/css/easy-icon-grid-admin.min.css'),
            false,
            VERSION
        );

        echo Templates::render(
            'settings.php',
            Settings::instance()
        );
    }
}
