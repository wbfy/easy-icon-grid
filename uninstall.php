<?php
namespace WBFY\EasyIconGrid;

defined('WP_UNINSTALL_PLUGIN') || exit;

/**
 * Uninstall plugin deleting options if required
 */
$options = get_option('easy_icon_grid');
if (!isset($options['config_data']['on_delete']) || $options['config_data']['on_delete']) {
    delete_option('easy_icon_grid');
}
