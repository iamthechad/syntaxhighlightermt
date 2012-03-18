=== Plugin Name ===
Contributors: iamthechad
Donate link: http://www.megatome.com/syntaxhighlighter/
Tags: highlight, code, syntax, code highlight
Requires at least: 2.7.1
Tested up to: 3.3.1
Stable tag: 2.2

Provides a simple way to use the Syntax Highlighter tool from http://alexgorbatchev.com/wiki/SyntaxHighlighter

== Description ==

This plugin works like many of the others that enable the use of the Syntax Highlighter tool. Dynamic plugin loading
is now available as part of the Syntax Highlighter tool, making brush configuration obsolete.

Available brushes are:
`applescript
actionscript3 as3
bash shell
coldfusion cf
cpp c
c# c-sharp csharp
css
delphi pascal
diff patch pas
erl erlang
groovy
java
jfx javafx
js jscript javascript
objc obj-c
perl pl
php
text plain
py python
ruby rails ror rb
sass scss
scala
sql
vb vbnet
xml xhtml xslt html`

== Installation ==

1. Unzip the `syntax-highlighter-mt` directory and upload it to `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How do I highlight code? =

Take a look at [http://alexgorbatchev.com/wiki/SyntaxHighlighter](http://alexgorbatchev.com/wiki/SyntaxHighlighter) for the documentation on using the Syntax Highlighter tool.
Basic usage is similar to: `<pre class="brush:php">...PHP code...</pre>`

= Why does my content containing “<” and “>” get messed up? =
This is an issue with using the `<pre />` tags. Replace the `<` characters with their entity escape of `&lt;` to get the desired result.
See http://alexgorbatchev.com/SyntaxHighlighter/manual/installation.html for more discussion.
(Note that this issue only happens if you are using the `<pre />` tags to surround the highlighted code.)

= I get an error saying "Can't find brush for: xxx" =

The most likely issue is that the specified brush is not available as part of the plugin install. 

= Why "Syntax Highlighter MT"? =

There are several plugins already that are named Syntax Highlighter, or some variant. I added "MT" (for Megatome Technologies - my company) to the name to make it unique.

== Screenshots ==

1. Styled Groovy code.
2. Styled Groovy code using the Django theme.
3. Styled Groovy code using the FadeToGrey theme.

== Changelog ==

= 2.2 =
* Added Objective C brush.

= 2.1 =
* Added ability to select coloration theme. This is a global setting.

= 2.0.1 =
* No functional changes. Just updating the compatible WP version numbers to be the most recent.

= 2.0 =
* Incorporate Syntax Highlighter 3.0.83
* Remove option page for enabled brushes since the Syntax Highlighter tool now uses dynamic loading

= 1.0 =
* Initial Version

== Upgrade Notice ==

This version has been tested with recent WordPress versions, and uses the most recent Syntax Highlighter version. Users
should upgrade if these features are desired.