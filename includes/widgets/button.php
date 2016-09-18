<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Button extends Widget_Base {

	public static function get_name() {
		return 'button';
	}

	public static function get_title() {
		return __( 'Button', 'elementor' );
	}

	public static function get_icon() {
		return 'button';
	}

	public static function get_button_sizes() {
		return [
			'small' => __( 'Small', 'elementor' ),
			'medium' => __( 'Medium', 'elementor' ),
			'large' => __( 'Large', 'elementor' ),
			'xl' => __( 'XL', 'elementor' ),
			'xxl' => __( 'XXL', 'elementor' ),
		];
	}

	protected static function _register_controls() {
		self::add_control(
			'section_button',
			[
				'label' => __( 'Button', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		self::add_control(
			'button_type',
			[
				'label' => __( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'section' => 'section_button',
				'options' => [
					'' => __( 'Default', 'elementor' ),
					'info' => __( 'Info', 'elementor' ),
					'success' => __( 'Success', 'elementor' ),
					'warning' => __( 'Warning', 'elementor' ),
					'danger' => __( 'Danger', 'elementor' ),
				],
			]
		);

		self::add_control(
			'text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'elementor' ),
				'placeholder' => __( 'Click me', 'elementor' ),
				'section' => 'section_button',
			]
		);

		self::add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'section' => 'section_button',
			]
		);

		self::add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'section' => 'section_button',
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		self::add_control(
			'size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'medium',
				'options' => self::get_button_sizes(),
				'section' => 'section_button',
			]
		);

		self::add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'section' => 'section_button',
			]
		);

		self::add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		self::add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		self::add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_button',
			]
		);

		self::add_control(
			'section_style',
			[
				'label' => __( 'Button', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		self::add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_style',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
				],
			]
		);

		self::add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_style',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		self::add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_style',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		self::add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'placeholder' => '1px',
				'default' => '1px',
				'section' => 'section_style',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		self::add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		self::add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		self::add_control(
			'section_hover',
			[
				'label' => __( 'Button Hover', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		self::add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_hover',
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		self::add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_hover',
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		self::add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_hover',
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		self::add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'tab' => Controls_Manager::TAB_STYLE,
				'section' => 'section_hover',
			]
		);
	}

	protected function render() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );

		//if ( ! empty( $instance['align'] ) ) {
		//	$this->add_render_attribute( 'wrapper', 'class', 'elementor-align-' . $instance['align'] );
		//}

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-link' );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}
		}

		$this->add_render_attribute( 'button', 'class', 'elementor-button' );

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( ! empty( $settings['button_type'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-button-' . $settings['button_type'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-button-icon' );
		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
				<span <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
					<?php if ( ! empty( $settings['icon'] ) ) : ?>
						<span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
							<i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
						</span>
					<?php endif; ?>
					<span class="elementor-button-text"><?php echo $settings['text']; ?></span>
				</span>
			</a>
		</div>
		<?php
	}

	protected static function _content_template() {
		?>
		<div class="elementor-button-wrapper">
			<a class="elementor-button elementor-button-{{ settings.button_type }} elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }}" href="{{ settings.link.url }}">
				<span class="elementor-button-content-wrapper">
					<# if ( settings.icon ) { #>
					<span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
						<i class="{{ settings.icon }}"></i>
					</span>
					<# } #>
					<span class="elementor-button-text">{{{ settings.text }}}</span>
				</span>
			</a>
		</div>
		<?php
	}
}
