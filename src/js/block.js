/**
 * Block content inspector handler
 *
 * @var object eigSettings global settings from localize_script
 * @package easy-icon-grid
 */

( function ( blockEditor, components, i18n, element ) {
	var el = element.createElement;     // used to create HTML elements

	/**
	 * Register block
	 */
	wp.blocks.registerBlockType(
		'wbfy/easy-icon-grid',
		{
			title: i18n.__( 'Easy Icon Grid', 'easy-icon-grid' ),
			description: i18n.__( 'Easily display grids of icons', 'easy-icon-grid' ),
			icon: 'screenoptions',
			category: 'widgets', //
			keywords: [
				i18n.__( 'icons', 'easy-icon-grid' ),
				i18n.__( 'grids', 'easy-icon-grid' ),
				i18n.__( 'features', 'easy-icon-grid' )
			],
			attributes: attributes(),

			/**
			 *  Render block for edit
			 */
			edit: function ( props ) {
				return [
					// Preview content.
					gridContent( props, 'preview' ),
					// Inspector elements
					el( blockEditor.InspectorControls, { key: 'inspector' },
						el( components.PanelBody, {
							title: i18n.__( 'Grid', 'easy-icon-grid' ),
							initialOpen: ( 'underfined' !== typeof props.attributes.title && '' == props.attributes.title ),
						},
							el( components.TextControl, {
								label: i18n.__( 'Title', 'easy-icon-grid' ),
								placeholder: i18n.__( 'Grid Title', 'easy-icon-grid' ),
								value: props.attributes.title,
								onChange: function ( newTitle ) { props.setAttributes( { title: newTitle } ); },
							} ),
							el( components.SelectControl, {
								label: i18n.__( 'Title Tag', 'easy-icon-grid' ),
								options: [
									{ label: i18n.__( 'Plain', 'easy-icon-grid' ), value: 'div' },
									{ label: i18n.__( 'Heading 1', 'easy-icon-grid' ), value: 'h1' },
									{ label: i18n.__( 'Heading 2', 'easy-icon-grid' ), value: 'h2' },
									{ label: i18n.__( 'Heading 3', 'easy-icon-grid' ), value: 'h3' },
									{ label: i18n.__( 'Heading 4', 'easy-icon-grid' ), value: 'h3' },
								],
								value: props.attributes.titleTag,
								onChange: function ( newTitleTag ) {
									props.setAttributes( { titleTag: newTitleTag } );
								}
							} ),
							el( components.SelectControl, {
								label: i18n.__( 'Alignment', 'easy-icon-grid' ),
								options: [
									{ label: i18n.__( 'Center', 'easy-icon-grid' ), value: 'center' },
									{ label: i18n.__( 'Left', 'easy-icon-grid' ), value: 'left' },
									{ label: i18n.__( 'Right', 'easy-icon-grid' ), value: 'right' },
								],
								value: props.attributes.titleAlign,
								onChange: function ( newTitleAlign ) {
									props.setAttributes( { titleAlign: newTitleAlign } );
								},
							} ),
							el( components.SelectControl, {
								label: i18n.__( 'Max Columns', 'easy-icon-grid' ),
								options: [
									{ label: i18n.__( '1', 'easy-icon-grid' ), value: '1' },
									{ label: i18n.__( '2', 'easy-icon-grid' ), value: '2' },
									{ label: i18n.__( '3', 'easy-icon-grid' ), value: '3' },
									{ label: i18n.__( '4', 'easy-icon-grid' ), value: '4' },
									{ label: i18n.__( '5', 'easy-icon-grid' ), value: '5' },
									{ label: i18n.__( '6', 'easy-icon-grid' ), value: '6' },
								],
								value: props.attributes.maxCols,
								onChange: function ( newMaxCols ) {
									props.setAttributes( { maxCols: newMaxCols } );
								},
							} )
						),
						el( components.PanelBody, {
							title: i18n.__( 'Icons', 'easy-icon-grid' ),
							initialOpen: false
						},
							el( components.SelectControl, {
								label: i18n.__( 'Size', 'easy-icon-grid' ),
								options: [
									{ label: i18n.__( 'Default', 'easy-icon-grid' ), value: 'default' },
									{ label: i18n.__( 'Small', 'easy-icon-grid' ), value: 'small' },
									{ label: i18n.__( 'Medium', 'easy-icon-grid' ), value: 'medium' },
									{ label: i18n.__( 'Large', 'easy-icon-grid' ), value: 'large' },
									{ label: i18n.__( 'Extra Large', 'easy-icon-grid' ), value: 'xlarge' }
								],
								value: props.attributes.iconSize,
								onChange: function ( newIconSize ) {
									props.setAttributes( { iconSize: newIconSize } );
								}
							} ),
							el( components.ColorPicker, {
								color: props.attributes.iconColor,
								label: i18n.__( 'Color', 'easy-icon-grid' ),
								help: i18n.__( 'Set the color the icons will be displayed in', 'easy-icon-grid' ),
								onChangeComplete: function ( newColor ) {
									props.setAttributes( { iconColor: newColor.hex } );
								}
							} )
						),
						inspectorIcons( props )
					)
				];
			},

			/**
			 * Render and save grid elements.
			 */
			save: function ( props ) {
				return gridContent( props, 'save' );
			}
		}
	);

	/**
	 * Generate grid elements including title
	 */
	function gridContent( props, displayMode ) {
		var grid = gridCells( props );

		if ( '' == props.attributes.title && !grid ) {
			var contentText = ( 'preview' == displayMode )
				? i18n.__( 'Use the Block Inspector on the right to update the Easy Icon Grid content', 'easy-icon-grid' )
				: i18n.__( '# Easy Icon Grid - Empty Block #', 'easy-icon-grid' );
			return el( 'p', { className: [ props.className, 'eig-center', 'eig-grid' ].join( ' ' ) }, contentText );
		}
		return el( 'div', { className: [ props.className, 'easy-icon-grid' ].join( ' ' ) },
			el( props.attributes.titleTag, { className: 'eig-' + props.attributes.titleAlign }, props.attributes.title ),
			el( 'ul', { className: 'eig-grid eig-' + props.attributes.titleAlign }, grid )
		);
	}

	/**
	 * Generate list of active icon grid cell elements
	 */
	function gridCells( props ) {
		var cells = [],
			hasContent = false;

		for ( var i = 1; i <= eigSettings.defaults.max_items; i++ ) {
			if ( 'undefined' !== typeof props.attributes[ 'icon' + i.toFixed() ] && '' != props.attributes[ 'icon' + i.toFixed() ] ) {
				cells.push( gridCell( props, i.toFixed() ) );
				hasContent = true;
			}
		}
		return ( hasContent ) ? cells : false;
	}

	/**
	 * Generate single grid cell element
	 */
	function gridCell( props, itemNo ) {
		var iconClass = eigSettings.font.class_prefix + props.attributes[ 'icon' + itemNo ];

		return el( 'li', { className: 'eig-cols-' + props.attributes.maxCols },
			el( 'div', { className: 'eig-icon' },
				el( 'span', {
					className: [ iconClass, 'eig-' + props.attributes.iconSize ].join( ' ' ),
					style: { color: props.attributes.iconColor }
				}, '' )
			),
			el( 'div', { className: 'eig-text' }, props.attributes[ 'text' + itemNo ] )
		);
	}

	/**
	 * Generate block inspector panels for grid cells
	 */
	function inspectorIcons( props ) {
		var panels = [];
		for ( var i = 1; i <= eigSettings.defaults.max_items; i++ ) {
			panels.push( inspectorIcon( props, i.toFixed() ) );
		}
		return panels;
	}

	/**
	 * Generate individual inspector panel for grid cell
	 */
	function inspectorIcon( props, itemNo ) {
		return el( components.PanelBody,
			{
				title: i18n.__( 'Icon ' + itemNo, 'easy-icon-grid' ),
				initialOpen: ( 'undefined' !== typeof props.attributes[ 'icon' + itemNo ] && '' == props.attributes[ 'icon' + itemNo ] ),
			},
			el( components.TextControl,
				{
					label: i18n.__( 'Class', 'easy-icon-grid' ),
					placeholder: i18n.__( 'Icon CSS Class', 'easy-icon-grid' ),
					value: props.attributes[ 'icon' + itemNo ],
					onChange: function ( newVal ) {
						var ret = {};
						ret[ 'icon' + itemNo ] = newVal;
						props.setAttributes( ret );
					},
				}
			),
			el( components.TextControl,
				{
					label: i18n.__( 'Text', 'easy-icon-grid' ),
					placeholder: i18n.__( 'Item Text', 'easy-icon-grid' ),
					value: props.attributes[ 'text' + itemNo ],
					onChange: function ( newVal ) {
						var ret = {};
						ret[ 'text' + itemNo ] = newVal;
						props.setAttributes( ret );
					},
				}
			)
		);
	}

	/**
	 * Initialise block attributes
	 */
	function attributes() {
		var attrs = {
			title: { type: 'string', default: '' },                                             // Grid title
			titleAlign: { type: 'string', default: eigSettings.defaults.title_align },          // Grid title alignment
			titleTag: { type: 'string', default: eigSettings.defaults.title_tag },              // Grid title HTML tag
			maxCols: { type: 'string', default: eigSettings.defaults.max_cols },                // Maximum cols in grid
			iconColor: { type: 'string', default: eigSettings.defaults.icon_color },            // Global icon color, default is orange
			iconSize: { type: 'string', default: eigSettings.defaults.icon_size },              // Icon size
		};
		// Icon classes and text
		for ( var i = 1; i <= eigSettings.defaults.max_items; i++ ) {
			attrs[ 'icon' + i ] = { type: 'string', default: '' };
			attrs[ 'text' + i ] = { type: 'string', default: '' };
		}
		return attrs;
	}
} )(
	// Backwards compatibility with WordPress-5.0 block API.
	( 'undefined' === typeof window.wp.blockEditor ) ? window.wp.editor : window.wp.blockEditor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element
);
