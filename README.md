# Flexia Core
Core plugin for Flexia theme. Controls all the plugin territory functionalities.

## Requirements

This is a specialized plugin for the theme [Flexia](https://github.com/rupok/flexia) that is available for free on [WordPress.org](https://wordpress.org/themes/flexia/). But since plugin works independently, it will work with any standard theme if you deactivate Flexia. 

## Features

The plan is to keep all the plugin territory functionality of Flexia within this plugin and it's a continuous process. It will provide the shortcodes, metabox and extra Customizer options.

* Shortcodes
* Extra Customizer Options
* Metaboxes


## Customizer Options

### Custom JavaScripts

You can add custom JavaScripts to your site header and footer through Customizer and edit your scripts with CodeMirror editor. You can place any custom JavaScript, Google Analytics, Facebook Pixel or any kind of embed script. Extremely helpful if you need to place any custom javascript or jQuery code to header or footer. This plugin gives you the ability to place different scripts to header or footer separately. Uses Customizer so you can edit the code live and see the changes on the fly.

* CodeMirror Editor
* Ability to add custom scripts to wp header.
* Ability to add custom scripts to wp footer.
* Ability to add multiple scripts.
* Ability to add Google Alalytics code.
* Ability to add any embed code.


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

#### [container] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
fluid | Is the container fluid? (see Bootstrap documentation for details) | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. | optional | any text | none

#### [container-fluid] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [row] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe. | optional | any text | none

#### [column] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xs | Size of column on extra small screens (less than 576px) | optional | 1-12 | false
sm | Size of column on small screens (greater than 576px) | optional | 1-12 | false
md | Size of column on medium screens (greater than 720px) | optional | 1-12 | false
lg | Size of column on large screens (greater than 960px) | optional | 1-12 | false
xl | Size of column on extra large screens (greater than 1140px) | optional | 1-12 | false
offset_xs | Offset on extra small screens | optional | 1-12 | false
offset_sm | Offset on small screens | optional | 1-12 | false
offset_md | Offset on column on medium screens | optional | 1-12 | false
offset_lg | Offset on column on large screens | optional | 1-12 | false
offset_xl | Offset on column on extra large screens | optional | 1-12 | false
order_xs | Order on extra small screens | optional | 1-12 | false
order_sm | Order on small screens | optional | 1-12 | false
order_md | Order on column on medium screens | optional | 1-12 | false
order_lg | Order on column on large screens | optional | 1-12 | false
order_xl | Order on column on extra large screens | optional | 1-12 | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe. | optional | any text | none

[Bootstrap 4 grid documentation](https://getbootstrap.com/docs/4.0/layout/grid/).