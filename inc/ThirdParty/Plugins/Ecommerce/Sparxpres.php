<?php

namespace WP_Rocket\ThirdParty\Plugins\Ecommerce;

use WP_Rocket\Event_Management\Subscriber_Interface;

class Sparxpres implements Subscriber_Interface
{

	public static function get_subscribed_events()
	{
		if(! class_exists('SparxpresUtils')) {
			return [];
		}
		return [
			'rocket_delay_js_exclusions' => 'add_delay_js_exclusions',
			'rocket_exclude_js' => 'add_js_exclusions',
		];
	}

	public function add_delay_js_exclusions($excluded) {
		$excluded[] = '/wp-includes/js/imagesloaded.min.js';
		return $excluded;
	}

	public function add_js_exclusions($excluded) {
		$excluded[] = '/sparxpres-for-woocommerce/assets/js/(.*)';
		return $excluded;
	}
}
