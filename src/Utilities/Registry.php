<?php

namespace TomMcFarlin\CategoryStickyPost\Utilities;

use TomMcFarlin\CategoryStickyPost\Subscriber\MetaBoxSubscriber;
use TomMcFarlin\CategoryStickyPost\Subscriber\SavePostSubscriber;

class Registry {

	private $subscribers = [
		MetaBoxSubscriber::class,
		SavePostSubscriber::class,
	];

	public function run() {
		array_map( function( $subscriber ) {
			( new $subscriber() )->subscribe();
		}, $this->subscribers );
	}
}
