<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\Admin\SavePostProcessor;

class SavePostSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new SavePostProcessor() )->add( 'save_post' );
	}
}
