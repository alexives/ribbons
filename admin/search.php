<?php

function print_results( $atts ) {
	extract(shortcode_atts( array(
		'cat' => -1,
		'tag' => -1,
		'zip' => '55033'
	), $atts ) );
}

add_shortcode('support_group_search');

?>