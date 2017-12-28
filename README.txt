=== Flexia Core ===

Contributors: re_enter_rupok, codetic
Tags: flexia, shortcodes, bootstrap-4, metabox, customizer, widgets
Requires at least: 4.0
Tested up to: 4.9.1
Stable tag: 1.1.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Core plugin for [Flexia](https://wordpress.org/themes/flexia/) theme. Controls all the plugin territory functionality for Flexia. 

== Description ==

Core plugin for [Flexia](https://wordpress.org/themes/flexia/) theme. Controls all the plugin territory functionality for Flexia. 

## Requirements

This is a specialized plugin for the theme [Flexia](https://wordpress.org/themes/flexia/) that is available for free on [WordPress.org](https://wordpress.org/themes/flexia/). But since plugin works independently, it will work with any standard theme if you deactivate Flexia. 

## Features

The plan is to keep all the plugin territory functionality of Flexia within this plugin and it's a continuous process. It will provide the shortcodes, metabox and extra Customizer options.

* Shortcodes
* Extra Customizer Options
* Metaboxes


## Customizer Options

* **Custom JavaScripts**
  * Header Script
  * Footer Script

You can add custom JavaScripts to your site header and footer through Customizer and edit your scripts with CodeMirror editor. You can place any custom JavaScript, Google Analytics, Facebook Pixel or any kind of embed script. Extremely helpful if you need to place any custom javascript or jQuery code to header or footer. This plugin gives you the ability to place different scripts to header or footer separately. Uses Customizer so you can edit the code live and see the changes on the fly.

* CodeMirror Editor
* Ability to add custom scripts to wp header.
* Ability to add custom scripts to wp footer.
* Ability to add multiple scripts.
* Ability to add Google Alalytics code.
* Ability to add any embed code.

Go to **Customize > Custom JavaScripts** to add your scripts.

## Shortcodes

* [Bootstrap 4 Grid](#grid)
  * Container
  * Container Fluid
  * Row
  * Columns (1-12)

## Shortcode usage


### Grid
	[row]
		[column md="6"]
			...
		[/column]
		[column md="6"]
			...
		[/column]
	[/row]

Add container (different max-width for various screen size)

	[container]
		[row]
			[column md="6"]
				...
			[/column]
			[column md="6"]
				...
			[/column]
		[/row]
	[/container]

Add container-fluid (100% width container)

	[container-fluid]
		[container]
			[row]
				[column md="6"]
					...
				[/column]
				[column md="6"]
					...
				[/column]
			[/row]
		[/container]
	[/container-fluid]


All shortcodes containes number of parameteres. [See the Github Repo for detailed documentation](https://github.com/rupok/flexia-core). 

== Installation ==

1. Upload `flexia-core.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Does it work standalone? =

It's a specialized plugin for Flexia theme, you need to install Flexia to get most of the features. But since plugin works independently, it will work with any standard theme if you deactivate Flexia. 



== Screenshots ==


== Changelog ==

= 1.1.0 =
* Bootstrap 4 Grid shortcodes added
* Custom JavaScripts option added to Customizer
* Lots of improvements

= 1.0.0 =
* Initial release
