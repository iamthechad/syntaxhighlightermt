=== Plugin Name ===
Contributors: iamthechad
Donate link: http://www.megatome.com/syntaxhighlighter/
Tags: highlight, code, syntax, code highlight
Requires at least: 2.7.1
Tested up to: 4.3.0
Stable tag: 2.2.5
License: LGPLv3/MIT
License URI: http://www.gnu.org/licenses/lgpl.html|http://opensource.org/licenses/MIT

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
hive
java
jfx javafx
js jscript javascript
objc obj-c
perl pl
php
pig
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

== Changing display themes ==

The display theme can be changed by navigating to `Settings` -> `Syntax Highlighter MT`. The themes available are:

* Default
* Django
* Eclipse
* Emacs
* FadeToGrey
* MDUltra
* Midnight
* RDark

== Advanced Usage ==

= Changing the appearance of code =
There are many options that can be applied inline to control how your formatted code is displayed. These are appended to the class definition after the brush declaration.

= auto-links =

*Enabled* by default. Disabling this turns off link detection in the highlighted section, making URLs non-clickable.

    <pre class="brush: java; auto-links: false">
    String link = "http://www.megatome.com";
    </pre>

= class-name =

Use this to specify one or more classes that should be applied to the generated highlight element.

= collapse =

*False* by default. Forces the highlighted code to be collapsed by default.

= first-line =

1 by default. Change the starting line number for a section of highlighted code.

    <pre class="brush: java; first-line: 20">
    String link = "http://www.megatome.com";
    </pre>

= gutter =

*Enabled* by default. Turn the line numbers on and off.

    <pre class="brush: java; gutter: false">
    String link = "http://www.megatome.com";
    </pre>

= highlight =

Specify one or more lines to be highlighted.

    <pre class="brush: java; highlight: [1, 3]">
    String link = "http://www.megatome.com";
    System.out.println("Hello World");
    System.out.println("Goodbye World");
    </pre>

= toolbar =

*Enabled* by default. Toggle the toolbar.

    <pre class="brush: java; toolbar: false">
    String link = "http://www.megatome.com";
    </pre>

= title =

Allows a title to be set for a block of code. This is not in the class, but in the `<pre/>` or `<script/>` tags.

    <pre class="brush: java" title="Here is some Java">
    String link = "http://www.megatome.com";
    </pre>

Take a look at [http://alexgorbatchev.com/wiki/SyntaxHighlighter](http://alexgorbatchev.com/wiki/SyntaxHighlighter) for the documentation on using the Syntax Highlighter tool.

== Frequently Asked Questions ==

= Highlighting code =
The basic usage is: `<pre class="brush:brush_name">...code...</pre>` where `brush_name` is one of the available brushes.

= Why does my content containing "&lt;" and "&gt;" get messed up? =
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

= 2.2.5 =
* Verified to work with Wordpress 4.1.

= 2.2.4 =
* Verified to work with Wordpress 3.9.
* Updated docs to describe changing themes. ([GitHub Issue #2](https://github.com/iamthechad/syntaxhighlightermt/issues/2))
* Properly serve assets over HTTPS as well as HTTP. ([GitHub Issue #1](https://github.com/iamthechad/syntaxhighlightermt/issues/1))

= 2.2.3 =
* Verified to work with Wordpress 3.8.
* Updated docs to include advanced usage.

= 2.2.2 =
* Added brushes for Pig and Hive QL.

= 2.2.1 =
* No functional changes. Just updating the compatible WP version numbers to be the most recent.

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