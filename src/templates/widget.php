<?php
/**
 * Template for widget inspector
 */
namespace WBFY\EasyIconGrid;

defined('ABSPATH') || exit;
?>
<style>
	.wbfy-widget-h3 { margin-bottom:0;text-align:center }
	.wbfy-widget-p { margin-bottom:0;margin-top:5px }
</style>
<h3 class="wbfy-widget-h3">
	<?php echo _e('Grid', 'easy-icon-grid'); ?>:
</h3>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('title'); ?>”><?php _e('Title:', 'easy-icon-grid');?></label>
	<input
		type="text"
		id="<?php echo $data['widget']->get_field_id('title'); ?>"
		name="<?php echo $data['widget']->get_field_name('title'); ?>"
		value="<?php echo esc_attr($data['content']['title']); ?>"
		class="widefat"
	>
</p>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('title_align'); ?>”><?php _e('Title Alignment:', 'easy-icon-grid');?></label>
	<select
		id="<?php echo $data['widget']->get_field_id('title_align'); ?>"
		title="<?php _e('Title alignment', 'easy-icon-grid');?>"
		name="<?php echo $data['widget']->get_field_name('title_align'); ?>"
		class="widefat"
	>
		<option value="left"<?php echo ($data['content']['title_align'] == 'left') ? ' selected' : ''; ?> >
			<?php echo _e('Aligned Left', 'easy-icon-grid'); ?>
		</option>
		<option value="right"<?php echo ($data['content']['title_align'] == 'right') ? ' selected' : ''; ?> >
			<?php echo _e('Aligned Right', 'easy-icon-grid'); ?>
		</option>
		<option value="center"<?php echo ($data['content']['title_align'] == 'center') ? ' selected' : ''; ?> >
			<?php echo _e('Centered', 'easy-icon-grid'); ?>
		</option>
	</select>
</p>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('title_tag'); ?>”><?php _e('Title Tag:', 'easy-icon-grid');?></label>
	<select
		id="<?php echo $data['widget']->get_field_id('title_tag'); ?>"
		title="<?php _e('Title Tag', 'easy-icon-grid');?>"
		name="<?php echo $data['widget']->get_field_name('title_tag'); ?>"
		class="widefat"
	>
		<option value="div"<?php echo ($data['content']['title_tag'] == 'div') ? ' selected' : ''; ?> >
			<?php echo _e('Plain', 'easy-icon-grid'); ?>
		</option>
		<option value="h1"<?php echo ($data['content']['title_tag'] == 'h1') ? ' selected' : ''; ?> >
			<?php echo _e('Heading 1', 'easy-icon-grid'); ?>
		</option>
		<option value="h2"<?php echo ($data['content']['title_tag'] == 'h2') ? ' selected' : ''; ?> >
			<?php echo _e('Heading 2', 'easy-icon-grid'); ?>
		</option>
		<option value="h3"<?php echo ($data['content']['title_tag'] == 'h3') ? ' selected' : ''; ?> >
			<?php echo _e('Heading 3', 'easy-icon-grid'); ?>
		</option>
		<option value="h4"<?php echo ($data['content']['title_tag'] == 'h4') ? ' selected' : ''; ?> >
			<?php echo _e('Hading 4', 'easy-icon-grid'); ?>
		</option>
	</select>
</p>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('max_cols'); ?>”><?php _e('Max Columns:', 'easy-icon-grid');?></label>
	<select
		id="<?php echo $data['widget']->get_field_id('max_cols'); ?>"
		title="<?php _e('Max columns', 'easy-icon-grid');?>"
		name="<?php echo $data['widget']->get_field_name('max_cols'); ?>"
		class="widefat"
	>
		<option value="1"<?php echo ($data['content']['max_cols'] == '1') ? ' selected' : ''; ?> >
			<?php echo _e('1', 'easy-icon-grid'); ?>
		</option>
		<option value="2"<?php echo ($data['content']['max_cols'] == '2') ? ' selected' : ''; ?> >
			<?php echo _e('2', 'easy-icon-grid'); ?>
		</option>
		<option value="3"<?php echo ($data['content']['max_cols'] == '3') ? ' selected' : ''; ?> >
			<?php echo _e('3', 'easy-icon-grid'); ?>
		</option>
		<option value="4"<?php echo ($data['content']['max_cols'] == '4') ? ' selected' : ''; ?> >
			<?php echo _e('4', 'easy-icon-grid'); ?>
		</option>
		<option value="5"<?php echo ($data['content']['max_cols'] == '5') ? ' selected' : ''; ?> >
			<?php echo _e('5', 'easy-icon-grid'); ?>
		</option>
		<option value="6"<?php echo ($data['content']['max_cols'] == '6') ? ' selected' : ''; ?> >
			<?php echo _e('6', 'easy-icon-grid'); ?>
		</option>
	</select>
</p>
<h3 class="wbfy-widget-h3">
	<?php echo _e('Icons', 'easy-icon-grid'); ?>:
</h3>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('icon_size'); ?>”><?php _e('Size:', 'easy-icon-grid');?></label>
	<select
		id="<?php echo $data['widget']->get_field_id('icon_size'); ?>"
		title="<?php _e('Icon size', 'easy-icon-grid');?>"
		name="<?php echo $data['widget']->get_field_name('icon_size'); ?>"
		class="widefat"
	>
		<option value="default"<?php echo ($data['content']['icon_size'] == 'default') ? ' selected' : ''; ?> >
			<?php echo _e('Set By Theme', 'easy-icon-grid'); ?>
		</option>
		<option value="small"<?php echo ($data['content']['icon_size'] == 'small') ? ' selected' : ''; ?> >
			<?php echo _e('Small', 'easy-icon-grid'); ?>
		</option>
		<option value="medium"<?php echo ($data['content']['icon_size'] == 'medium') ? ' selected' : ''; ?> >
			<?php echo _e('Medium', 'easy-icon-grid'); ?>
		</option>
		<option value="large"<?php echo ($data['content']['icon_size'] == 'large') ? ' selected' : ''; ?> >
			<?php echo _e('Large', 'easy-icon-grid'); ?>
		</option>
		<option value="xlarge"<?php echo ($data['content']['icon_size'] == 'xlarge') ? ' selected' : ''; ?> >
			<?php echo _e('Extra Large', 'easy-icon-grid'); ?>
		</option>
	</select>
</p>
<p class="wbfy-widget-p">
	<div>
		<label for=”<?php echo $data['widget']->get_field_id('icon_color'); ?>”><?php _e('Color:', 'easy-icon-grid');?></label>
	</div>
	<input
		type="text"
		class="wbfy-color-picker widefat"
		id="<?php echo $data['widget']->get_field_id('icon_color'); ?>"
		name="<?php echo $data['widget']->get_field_name('icon_color'); ?>"
		data-default-color="<?php echo esc_attr($data['content']['icon_color']); ?>"
		value="<?php echo esc_attr($data['content']['icon_color']); ?>"
	>
</p>
<?php
for ($i = 1; $i <= MAX_ITEMS; $i++) {
    ?>
<h3 class="wbfy-widget-h3">
	<?php echo _e('Icon ' . $i, 'easy-icon-grid'); ?>:
</h3>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('item' . $i . '_icon'); ?>”><?php _e('Class:', 'easy-icon-grid');?></label>
	<input
		type="text"
		placeholder="<?php _e('Icon', 'easy-icon-grid');?>"
		id="<?php echo $data['widget']->get_field_id('item' . $i . '_icon'); ?>"
		name="<?php echo $data['widget']->get_field_name('item' . $i . '_icon'); ?>"
		value="<?php echo esc_attr($data['content']['item' . $i . '_icon']); ?>"
		class="widefat"
	>
</p>
<p class="wbfy-widget-p">
	<label for=”<?php echo $data['widget']->get_field_id('item' . $i . '_text'); ?>”><?php _e('Text:', 'easy-icon-grid');?></label>
	<input
		type="text"
		placeholder="<?php _e('Text', 'easy-icon-grid');?>"
		id="<?php echo $data['widget']->get_field_id('item' . $i . '_text'); ?>"
		name="<?php echo $data['widget']->get_field_name('item' . $i . '_text'); ?>"
		value="<?php echo esc_attr($data['content']['item' . $i . '_text']); ?>"
		class="widefat"
	>
</p>
<?php
}
