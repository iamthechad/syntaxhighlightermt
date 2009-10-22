=== Plugin Name ===
Contributors: iamthechad
Donate link: http://www.megatome.com/
Tags: highlight, code, syntax, code highlight
Requires at least: 2.7.1
Tested up to: 2.8.5
Stable tag: 1.0

Provides a simple way to use the Syntax Highlighter tool from http://alexgorbatchev.com/wiki/SyntaxHighlighter

== Description ==

This plugin works like many of the others that enable the use of the Syntax Highlighter tool. The main difference
this plugin has is that you can disable any of the code styling JavaScript files that you are not using in order to
reduce page loading sizes and times.

== Installation ==

1. Unzip the `syntax-highlighter-mt` directory and upload it to `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Using the Settings menu, make any desired changes to the plugin's behavior.

== Frequently Asked Questions ==

= How do I highlight code? =

Take a look at [http://alexgorbatchev.com/wiki/SyntaxHighlighter](http://alexgorbatchev.com/wiki/SyntaxHighlighter) for the documentation on using the Syntax Highlighter tool.
Basic usage is similar to: `<pre class="brush:php">...PHP code...</pre>`

= I get an error saying "Can't find brush for: xxx" =

The most likely issue is that you have disabled the brush required to show the type of code specified in the `<pre>` tag. Go to 'Settings' -> 'Syntax Highlighter' to verify the correct brush is enabled.

= Why "Syntax Highlighter MT"? =

There are several plugins already that are named Syntax Highlighter, or some variant. I added "MT" (for Megatome Technologies - my company) to the name to make it unique.

== Screenshots ==

1. Brush options.
2. Styled Groovy code.

== Changelog ==

= 1.0 =
* Initial Version