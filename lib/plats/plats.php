<?php

namespace Plats;

include_once 'projects.php';

function thumb() {
	add_image_size('x-small', 200, 200);
	add_image_size('small', 250, 250);
}
add_action('after_setup_theme', __NAMESPACE__ . '\\thumb');