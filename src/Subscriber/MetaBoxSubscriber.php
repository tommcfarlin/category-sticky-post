<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\Admin\MetaBox;

class MetaBoxSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new MetaBox( 'add_meta_boxes' ) )->add();
	}
}
