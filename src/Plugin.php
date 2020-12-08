<?php

namespace TomMcFarlin\CategoryStickyPost;

use TomMcFarlin\CategoryStickyPost\Utilities\Registry;

class Plugin {
	public function start() {
		( new Registry() )->run();
	}
}
