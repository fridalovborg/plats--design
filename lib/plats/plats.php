<?php
/**
* Functions Plats
* @param $params
* @return $params
*/
namespace Plats;

include_once 'projekt.php';
include_once 'instagram.php';

function thumb() {
	add_image_size('plats-archive', 600, 600);
	add_image_size('plats-single', 1800, 1800);
}
add_action('after_setup_theme', __NAMESPACE__ . '\\thumb');

add_filter('dynamic_sidebar_params', function($params) {
	$widget_id = $params[0]['widget_id'];

	$instagram_url = get_field('url', 'widget_' . $widget_id);

	if ($instagram_url) {
		$html = '<a class="icon" href="' . $instagram_url . '" target="_blank">';
		$html .= '<img src="' . get_template_directory_uri() . '/dist/images/instagram.svg">';
		$html .= '</a>';

		$params[0]['after_widget'] .= $html;
	}

	return $params;
});