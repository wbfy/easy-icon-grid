<?php
/**
 * Template for widget inspector
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;
?>
<style>
	.eig-widget-h3 { margin-bottom:0;text-align:center }
	.eig-widget-p { margin-bottom:0;margin-top:5px }
</style>
<h3 class="eig-widget-h3">
	<?php echo esc_html_e( 'Grid', 'easy-icon-grid' ); ?>:
</h3>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'title' ) ); ?>”><?php esc_html_e( 'Title:', 'easy-icon-grid' ); ?></label>
	<input
		type="text"
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'title' ) ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'title' ) ); ?>"
		value="<?php echo esc_attr( $data['content']['title'] ); ?>"
		class="widefat"
	>
</p>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'title_tag' ) ); ?>”><?php esc_html_e( 'Title Tag:', 'easy-icon-grid' ); ?></label>
	<select
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'title_tag' ) ); ?>"
		title="<?php esc_html_e( 'Title Tag', 'easy-icon-grid' ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'title_tag' ) ); ?>"
		class="widefat"
	>
		<option value="div"<?php echo ( 'div' === $data['content']['title_tag'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Plain', 'easy-icon-grid' ); ?>
		</option>
		<option value="h1"<?php echo ( 'h1' === $data['content']['title_tag'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Heading 1', 'easy-icon-grid' ); ?>
		</option>
		<option value="h2"<?php echo ( 'h2' === $data['content']['title_tag'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Heading 2', 'easy-icon-grid' ); ?>
		</option>
		<option value="h3"<?php echo ( 'h3' === $data['content']['title_tag'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Heading 3', 'easy-icon-grid' ); ?>
		</option>
		<option value="h4"<?php echo ( 'h4' === $data['content']['title_tag'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Hading 4', 'easy-icon-grid' ); ?>
		</option>
	</select>
</p>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'title_align' ) ); ?>”><?php esc_html_e( 'Alignment:', 'easy-icon-grid' ); ?></label>
	<select
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'title_align' ) ); ?>"
		title="<?php esc_html_e( 'Alignment', 'easy-icon-grid' ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'title_align' ) ); ?>"
		class="widefat"
	>
		<option value="left"<?php echo ( 'left' === $data['content']['title_align'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Left', 'easy-icon-grid' ); ?>
		</option>
		<option value="right"<?php echo ( 'right' === $data['content']['title_align'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Right', 'easy-icon-grid' ); ?>
		</option>
		<option value="center"<?php echo ( 'center' === $data['content']['title_align'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Center', 'easy-icon-grid' ); ?>
		</option>
	</select>
</p>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'max_cols' ) ); ?>”><?php esc_html_e( 'Max Columns:', 'easy-icon-grid' ); ?></label>
	<select
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'max_cols' ) ); ?>"
		title="<?php esc_html_e( 'Max columns', 'easy-icon-grid' ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'max_cols' ) ); ?>"
		class="widefat"
	>
		<option value="1"<?php echo ( 1 === (int) $data['content']['max_cols'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( '1', 'easy-icon-grid' ); ?>
		</option>
		<option value="2"<?php echo ( 2 === (int) $data['content']['max_cols'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( '2', 'easy-icon-grid' ); ?>
		</option>
		<option value="3"<?php echo ( 3 === (int) $data['content']['max_cols'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( '3', 'easy-icon-grid' ); ?>
		</option>
		<option value="4"<?php echo ( 4 === (int) $data['content']['max_cols'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( '4', 'easy-icon-grid' ); ?>
		</option>
		<option value="5"<?php echo ( 5 === (int) $data['content']['max_cols'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( '5', 'easy-icon-grid' ); ?>
		</option>
		<option value="6"<?php echo ( 6 === (int) $data['content']['max_cols'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( '6', 'easy-icon-grid' ); ?>
		</option>
	</select>
</p>
<h3 class="eig-widget-h3">
	<?php echo esc_html_e( 'Icons', 'easy-icon-grid' ); ?>:
</h3>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'icon_size' ) ); ?>”><?php esc_html_e( 'Size:', 'easy-icon-grid' ); ?></label>
	<select
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'icon_size' ) ); ?>"
		title="<?php esc_attr_e( 'Icon size', 'easy-icon-grid' ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'icon_size' ) ); ?>"
		class="widefat"
	>
		<option value="default"<?php echo ( 'default' === $data['content']['icon_size'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Set By Theme', 'easy-icon-grid' ); ?>
		</option>
		<option value="small"<?php echo ( 'small' === $data['content']['icon_size'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Small', 'easy-icon-grid' ); ?>
		</option>
		<option value="medium"<?php echo ( 'medium' === $data['content']['icon_size'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Medium', 'easy-icon-grid' ); ?>
		</option>
		<option value="large"<?php echo ( 'large' === $data['content']['icon_size'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Large', 'easy-icon-grid' ); ?>
		</option>
		<option value="xlarge"<?php echo ( 'xlarge' === $data['content']['icon_size'] ) ? ' selected' : ''; ?> >
			<?php esc_html_e( 'Extra Large', 'easy-icon-grid' ); ?>
		</option>
	</select>
</p>
<p class="eig-widget-p">
	<div>
		<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'icon_color' ) ); ?>”><?php esc_html_e( 'Color:', 'easy-icon-grid' ); ?></label>
	</div>
	<input
		type="text"
		class="eig-color-picker widefat"
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'icon_color' ) ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'icon_color' ) ); ?>"
		data-default-color="<?php echo esc_attr( $data['content']['icon_color'] ); ?>"
		value="<?php echo esc_attr( $data['content']['icon_color'] ); ?>"
	>
</p>
<?php
for ( $i = 1; $i <= MAX_ITEMS; $i++ ) {
	?>
<h3 class="eig-widget-h3">
	<?php esc_html_e( 'Icon', 'easy-icon-grid' ) . ' ' . $i; ?>:
</h3>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'item' . $i . '_icon' ) ); ?>”><?php esc_html_e( 'Class:', 'easy-icon-grid' ); ?></label>
	<input
		type="text"
		placeholder="<?php esc_html_e( 'Icon', 'easy-icon-grid' ); ?>"
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'item' . $i . '_icon' ) ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'item' . $i . '_icon' ) ); ?>"
		value="<?php echo esc_attr( $data['content'][ 'item' . $i . '_icon' ] ); ?>"
		class="widefat"
	>
</p>
<p class="eig-widget-p">
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'item' . $i . '_text' ) ); ?>”><?php esc_html_e( 'Text:', 'easy-icon-grid' ); ?></label>
	<input
		type="text"
		placeholder="<?php esc_attr_e( 'Text', 'easy-icon-grid' ); ?>"
		id="<?php echo esc_attr( $data['widget']->get_field_id( 'item' . $i . '_text' ) ); ?>"
		name="<?php echo esc_attr( $data['widget']->get_field_name( 'item' . $i . '_text' ) ); ?>"
		value="<?php echo esc_attr( $data['content'][ 'item' . $i . '_text' ] ); ?>"
		class="widefat"
	>
</p>
	<?php
}
