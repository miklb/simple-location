<?php
// Bing Map Provider
class Geo_Provider_Bing extends Geo_Provider {


	public function __construct( $args = array() ) {
		if ( ! isset( $args['api'] ) ) {
			$args['api'] = get_option( 'sloc_bing_api' );
		}
		if ( ! isset( $args['style' ] ) ) {
			$args['style'] = get_option( 'sloc_bing_style' );
		}
		parent::__construct( $args );
	}

	public function reverse_lookup( ) {
		$response = wp_remote_get( 'http://dev.virtualearth.net/REST/v1/Locations/' . $this->latitude . ',' . $this->longitude . '&key=' . $this->api );
		$json = json_decode( $response['body'], true );
		//$address = $json['results'][0]['address_components'];
		$addr = array(
		//	'name' => $json['results'][0]['formatted_address'],
			'latitude' => $this->latitude,
			'longitude' => $this->longitude,
			'raw' => $json,
		);
		$addr = array_filter( $addr );
		// $addr['display-name'] = $this->display_name( $addr );
		$tz = $this->timezone( $this->latitude, $this->longitude );
		$addr = array_merge( $addr, $tz );
		return $addr;
	}

	public function get_styles() {
		return array(
			'Aerial' => __( 'Aerial Imagery', 'simple-location' ),
			'AerialWithLabels' => __( 'Aerial Imagery with a Road Overlay', 'simple-location' ),
			'CanvasLight' => __( 'A lighter version of the road maps which also has some of the details such as hill shading disabled.', 'simple-location' ),
			'CanvasDark' => __( 'A dark version of the road maps.', 'simple-location' ),
			'CanvasGray' => __( 'A grayscale version of the road maps.', 'simple-location' ),
			'Road' => __( 'Roads without additional imagery', 'simple-location' ),
		);
	}

	// Return code for map
	public function get_the_static_map( ) {
		$map = 'http://dev.virtualearth.net/REST/v1/Imagery/Map/' . $this->style . '/' . $this->latitude . ',' . $this->longitude . '/' . $this->map_zoom . '?mapSize=' . $this->width . ',' . $this->height . '&key=' . $this->api;
		return $map;
	}

	public function get_the_map_url() {
		return 'http://bing.com/maps/default.aspx?cp=' . $this->latitude . ',' . $this->longitude . '&lvl=' . $this->map_zoom;
	}

	// Return code for map
	public function get_the_map( $static = true) {
		$map = $this->get_the_static_map( );
		$link = $this->get_the_map_url( );
		$c = '<a href="' . $link . '"><img src="' . $map . '" /></a>';
		return $c;
	}

}
