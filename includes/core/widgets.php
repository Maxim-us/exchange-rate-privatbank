<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Adds exchange rate privatbank widget.
 */
class mxerpb_exchange_rate_privatbank extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'mxerpb_exchange_rate_privatbank', // Base ID
			__( 'Курс валют ПриватБанка', 'mxerp-domain' ), // Name
			array( 'description' => __( 'Выводит курс валют USD, EUR, RUR, BTC к гривне', 'mxerp-domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo $this->show_exchange_rate_privatbank();

		echo $args['after_widget'];
	}

	public function show_exchange_rate_privatbank()
	{		

		$url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';

		if( $this->check_if_url_exists( $url ) ) {

			$data = file_get_contents( $url );

			$exchange_courses = json_decode( $data, true );

			if( is_array( $exchange_courses ) ) {

				?>

				<div class="clearfix"></div>
				<div class="mx-exchange-rate-wrap">

					<div class="mx-exchange-rate-row mx-exchange-rate-row-header">
						<div class="mx-rate-name">Валюта</div>
						<div class="mx-rate-buy">Покупка</div>
						<div class="mx-rate-sale">Продажа</div>
					</div>

					<?php foreach( $exchange_courses as $exchange_cours ) : ?>

						<div class="mx-exchange-rate-row">
							<div class="mx-rate-name"><?php echo $exchange_cours['ccy']; ?></div>
							<div class="mx-rate-buy"><?php echo round( $exchange_cours['buy'], 2 ); ?></div>
							<div class="mx-rate-sale"><?php echo round( $exchange_cours['sale'], 2 ); ?></div>
						</div>

					<?php endforeach; ?>

				</div>
				<div class="clearfix"></div>

			<? }

		}

	}

		public function check_if_url_exists( $url )
		{

			$curl = curl_init( $url );

			curl_setopt( $curl, CURLOPT_NOBODY, true );

			$result = curl_exec($curl);

			return $result;

		}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Курс валют ПриватБанка', 'mxerp-domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class mxerpb_exchange_rate_privatbank

// register mxerpb_exchange_rate_privatbank widget
function register_mxerpb_exchange_rate_privatbank() {
    register_widget( 'mxerpb_exchange_rate_privatbank' );
}
add_action( 'widgets_init', 'register_mxerpb_exchange_rate_privatbank' );