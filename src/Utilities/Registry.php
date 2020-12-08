<?php

namespace TomMcFarlin\CategoryStickyPost\Utilities;

use TomMcFarlin\CategoryStickyPost\Subscriber\MetaBoxSubscriber;

class Registry {

	private $subscribers = [
		MetaBoxSubscriber::class,
	];

	public function run() {
		array_map( function( $subscriber ) {
			( new $subscriber() )->subscribe();
		}, $this->subscribers );
	}
}
