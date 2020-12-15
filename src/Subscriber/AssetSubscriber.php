<?php

namespace TomMcFarlin\CategoryStickyPost\Subscriber;

use TomMcFarlin\CategoryStickyPost\WordPress\StylesheetService;
use TomMcFarlin\CategoryStickyPost\WordPress\Admin\AdminStylesheetService;

class AssetSubscriber extends AbstractSubscriber {
	public function subscribe() {
		( new StylesheetService() )->add( 'wp_enqueue_scripts' );
		( new AdminStylesheetService() )->add( 'admin_enqueue_scripts' );
	}
}
