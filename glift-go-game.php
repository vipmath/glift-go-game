<?php

/*
Plugin Name: Glift Go Game
Version: 0.6.5
Plugin URI: https://gogameguru.com/glift/
Description: Bring the board game Go (围棋 weiqi, 囲碁 igo or 바둑 baduk) to your WordPress site. Integrates the Glift JavaScript Go library with WordPress.
Author: Go Game Guru
Author URI: https://gogameguru.com/
License: MIT (X11)

Glift Go Game WordPress Plugin
Copyright (c) 2014, 2015 Go Game Guru

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

// if we're not running in WordPress, then stop here
if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/* setup important variables and constants all in one place */

define( 'GLIFT_JS_VERSION', '1.1.1' ); // change this number on js upgrade

// specify available themes (used for settings dropdown and validation)
$glift_themes = array(
	'COLORFUL',
	'DEFAULT',
	'DEPTH',
	'MOODY',
	'TEXTBOOK',
	'TRANSPARENT'
);

// hardcoded default options - don't hack these, use your settings menu instead
$glift_default_options = array(
	'height' => '500', // set the default glift div height
	'width' => '0', // set the default glift div width (0 means 100% div width)
	'theme' => 'DEFAULT', // set the default theme
	'background' => NULL, // no goBoardBackground by default
	'coords' => TRUE, // enable coordinates by default
	'disable_zoom' => FALSE, // don't disable zoom by default
	'noscript' => 'Please enable JavaScript to view this game.', //noscript text
	'anchor_text' => 'Download SGF', // default anchor text for SGF download
	'nolink' => FALSE // don't disable automatic SGF hyperlink by default
);

// find and store the absolute plugin URL (this also returns current protocol)
define( 'GLIFT_URL', plugins_url( '', __FILE__ ) );

// find plugin files and load the plugin
define( 'GLIFT_PATH', plugin_dir_path( __FILE__ ) );
require( GLIFT_PATH.'includes/glift-main.php' );
