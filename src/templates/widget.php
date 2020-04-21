<?php
/**
 * Template for widget inspector
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;
?>
<h3>
	<?php esc_html_e( 'Grid', 'easy-icon-grid' ); ?>:
</h3>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'title' ) ); ?>”><?php esc_html_e( 'Title:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::input_text(
			array(
				'id'        => $data['widget']->get_field_id( 'title' ),
				'name'      => $data['widget']->get_field_name( 'title' ),
				'maxlength' => '150',
				'value'     => $data['content']['title'],
				'class'     => 'widefat',
			)
		);
		// @phpcs:enable
		?>
</p>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'title_tag' ) ); ?>”><?php esc_html_e( 'Title Tag:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::select_list(
			array(
				'div' => esc_html__( 'Plain', 'easy-icon-grid' ),
				'h1'  => esc_html__( 'Heading 1', 'easy-icon-grid' ),
				'h2'  => esc_html__( 'Heading 2', 'easy-icon-grid' ),
				'h3'  => esc_html__( 'Heading 3', 'easy-icon-grid' ),
				'h4'  => esc_html__( 'Heading 4', 'easy-icon-grid' ),
			),
			array(
				'value' => $data['content']['title_tag'],
				'id'    => $data['widget']->get_field_id( 'title_tag' ),
				'name'  => $data['widget']->get_field_name( 'title_tag' ),
				'class' => 'widefat',
			)
		);
		// @phpcs:enable
		?>
</p>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'title_align' ) ); ?>”><?php esc_html_e( 'Alignment:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::select_list(
			array(
				'left'   => esc_html__( 'Left', 'easy-icon-grid' ),
				'right'  => esc_html__( 'Right', 'easy-icon-grid' ),
				'center' => esc_html__( 'Center', 'easy-icon-grid' ),
			),
			array(
				'value' => $data['content']['title_align'],
				'id'    => $data['widget']->get_field_id( 'title_align' ),
				'name'  => $data['widget']->get_field_name( 'title_align' ),
				'class' => 'widefat',
			)
		);
		// @phpcs:enable
		?>
</p>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'max_cols' ) ); ?>”><?php esc_html_e( 'Max Columns:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::select_range(
			1,
			6,
			array(
				'value' => $data['content']['max_cols'],
				'id'    => $data['widget']->get_field_id( 'max_cols' ),
				'name'  => $data['widget']->get_field_name( 'max_cols' ),
				'class' => 'widefat',
			)
		);
		// @phpcs:enable
		?>
</p>
<h3>
	<?php echo esc_html_e( 'Icons', 'easy-icon-grid' ); ?>:
</h3>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'icon_size' ) ); ?>”><?php esc_html_e( 'Size:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::select_list(
			array(
				'default' => esc_html__( 'Set By Theme', 'easy-icon-grid' ),
				'small'   => esc_html__( 'Small', 'easy-icon-grid' ),
				'medium'  => esc_html__( 'Medium', 'easy-icon-grid' ),
				'large'   => esc_html__( 'Large', 'easy-icon-grid' ),
				'xlarge'  => esc_html__( 'Extra Large', 'easy-icon-grid' ),
			),
			array(
				'value' => $data['content']['icon_size'],
				'id'    => $data['widget']->get_field_id( 'icon_size' ),
				'name'  => $data['widget']->get_field_name( 'icon_size' ),
				'class' => 'widefat',
			)
		);
		// @phpcs:enable
		?>
</p>
<p>
	<div>
		<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'icon_color' ) ); ?>”><?php esc_html_e( 'Color:', 'easy-icon-grid' ); ?></label>
	</div>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::input_text(
			array(
				'id'        => $data['widget']->get_field_id( 'icon_color' ),
				'name'      => $data['widget']->get_field_name( 'icon_color' ),
				'maxlength' => '10',
				'value'     => $data['content']['icon_color'],
				'class'     => 'eig-color-picker widefat',
			)
		);
		// @phpcs:enable
		?>
</p>
<?php
for ( $i = 1; $i <= MAX_ITEMS; $i++ ) {
	?>
<h3>
	<?php esc_html_e( 'Icon', 'easy-icon-grid' ) . ' ' . $i; ?>:
</h3>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'item' . $i . '_icon' ) ); ?>”><?php esc_html_e( 'Class:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::input_text(
			array(
				'id'        => $data['widget']->get_field_id( 'item' . $i . '_icon' ),
				'name'      => $data['widget']->get_field_name( 'item' . $i . '_icon' ),
				'maxlength' => '10',
				'value'     => $data['content'][ 'item' . $i . '_icon' ],
				'class'     => 'widefat',
			)
		);
		// @phpcs:enable
	?>
</p>
<p>
	<label for=”<?php echo esc_attr( $data['widget']->get_field_id( 'item' . $i . '_text' ) ); ?>”><?php esc_html_e( 'Text:', 'easy-icon-grid' ); ?></label>
	<?php
		// @phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
		echo Html::input_text(
			array(
				'id'        => $data['widget']->get_field_id( 'item' . $i . '_text' ),
				'name'      => $data['widget']->get_field_name( 'item' . $i . '_text' ),
				'maxlength' => '10',
				'value'     => $data['content'][ 'item' . $i . '_text' ],
				'class'     => 'widefat',
			)
		);
		// @phpcs:enable
	?>
</p>
	<?php
}
