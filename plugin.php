<?php
/**
 * Category Sticky Post
 *
 * Mark a post to be displayed at the top of the category archive page.
 *
 * php version 7.3
 *
 * @category  WordPress_Plugin
 * @package   CategoryStickyPost
 * @author    Tom McFarlin <tom@tommcfarlin.com>
 * @copyright 2013 - 2020 Tom McFarlin
 * @license   GPL 3.0 <https://www.gnu.org/licenses/gpl-3.0.txt>
 * @link      https://tommcfarlin.com/category-sticky-post/
 *
 * @wordpress-plugin
 * Plugin Name:  Category Sticky Post
 * Plugin URI:   https://tommcfarlin.com/category-sticky-post/
 * Description:  Mark a post to be displayed at the top of the category archive page.
 * Requires PHP: 7.3
 * Version:      3.0.0
 * Author:       Tom McFarlin
 * Author URI:   https://tommcfarlin.com
 * Text Domain:  category-sticky-post
 * License:      GPL-3.0+
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace TomMcFarlin\CategoryStickyPost;

// This file cannot be called directly.
defined( 'WPINC' ) || die;

// Include the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

( new Plugin() )->start();
