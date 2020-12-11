<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\Admin\StylesheetService;

class AssetSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new StylesheetService() )->load( 'wp_enqueue_scripts' );
	}
}
