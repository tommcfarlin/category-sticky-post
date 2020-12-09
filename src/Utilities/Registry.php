<?php

namespace TomMcFarlin\CategoryStickyPost\Utilities;

use TomMcFarlin\CategoryStickyPost\Subscriber\MetaBoxSubscriber;
use TomMcFarlin\CategoryStickyPost\Subscriber\SavePostSubscriber;
use TomMcFarlin\CategoryStickyPost\Subscriber\CategoryPageSubscriber;

class Registry {

	private $subscribers = [
		MetaBoxSubscriber::class,
		SavePostSubscriber::class,
		CategoryPageSubscriber::class,
	];

	public function run() {
		array_map( function( $subscriber ) {
			( new $subscriber() )->subscribe();
		}, $this->subscribers );
	}
}
