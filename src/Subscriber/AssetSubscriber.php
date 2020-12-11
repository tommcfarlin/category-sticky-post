<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\Admin\StylesheetService;

class AssetSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new StylesheetService() )->add( 'wp_enqueue_scripts' );
	}
}
