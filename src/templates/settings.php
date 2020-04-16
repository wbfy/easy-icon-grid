<?php
/**
 * Template for settings page
 */
namespace WBFY\EasyIconGrid;

defined('ABSPATH') || exit;
?>
<div class="wrap wbfy-admin">
	<h1>
		<?php _e('Configure Easy Icon Grid', 'easy-icon-grid');?>
	</h1>
	<form method="post" action="options.php" name="easy-icon-grid-admin" class="easy-icon-grid-admin">
<?php
settings_fields('easy_icon_grid_settings');
do_settings_sections('easy_icon_grid_settings');
submit_button();
?>
	</form>
</div>
