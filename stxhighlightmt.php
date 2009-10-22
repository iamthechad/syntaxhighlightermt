<?php
/*
    Copyright (C) 2009  Megatome Technologies

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/*
Plugin Name: Syntax Highlighter MT
Plugin URI: http://www.megatome.com/syntaxhighlighter
Description: Provides a simple way to use the Syntax Highlighter tool from <a href="http://alexgorbatchev.com/wiki/SyntaxHighlighter">http://alexgorbatchev.com/wiki/SyntaxHighlighter</a>
Version: 1.0
Author: Chad Johnston
Author URI: http://www.megatome.com
*/

$mtsh_brushes = mtsh_build_brush_array();

function mtsh_write_head() {
    global $mtsh_brushes;
    $options = get_option('mtsh_brush_options');
    $x = WP_PLUGIN_URL.'/'.str_replace("/" . basename( __FILE__),"",plugin_basename(__FILE__));
    echo "<script type='text/javascript' src='$x/scripts/shCore.js'></script>\n";
    echo "<script type='text/javascript' src='$x/scripts/shLegacy.js'></script>\n";
    foreach (array_keys($options) as $option_name) {
        $brush_file_part = $mtsh_brushes[$option_name][2];
        echo "<script type='text/javascript' src='$x/scripts/shBrush$brush_file_part.js'></script>\n";
    }
	echo "<link type='text/css' rel='stylesheet' href='$x/styles/shCore.css'/>\n";
	echo "<link type='text/css' rel='stylesheet' href='$x/styles/shThemeDefault.css'/>\n";
	echo "<script type='text/javascript'>\n";
	echo "	SyntaxHighlighter.config.clipboardSwf = '$x/scripts/clipboard.swf';\n";
	echo "	SyntaxHighlighter.all();\n";
	echo "</script>\n";
}
add_action('wp_head', 'mtsh_write_head');

if (is_admin()) {
    add_action('admin_menu', 'mtsh_plugin_menu');
    add_action('admin_init', 'mtsh_register_settings');
}

register_activation_hook( __FILE__, 'mtsh_activate' );
register_deactivation_hook(__FILE__, 'mtsh_deactivate');

function mtsh_plugin_menu() {
  add_options_page(__('Syntax Highlighter'), __('Syntax Highlighter'), 'administrator', 'mtshoptions', 'mtsh_plugin_options');
}

function mtsh_register_settings() {
  register_setting('mtshoption_group', 'mtsh_brush_options');
}

function mtsh_activate() {
  global $mtsh_brushes;
  if (count($mtsh_brushes) < 1) {
    $mtsh_brushes = mtsh_build_brush_array();
  }
  $brushes = array();
  foreach (array_keys($mtsh_brushes) as $optname) {
    $brushes[$optname] = '1';
  }
  add_option('mtsh_brush_options', $brushes);
}

function mtsh_deactivate() {
  delete_option('mtsh_brush_options');
}

function mtsh_plugin_options() {
  global $mtsh_brushes;
  ?>
  <div class="wrap">
  <h2><?php _e('Syntax Highlighter') ?></h2>
  <p><?php _e('Disable any brushes(highlighters) you do not wish to use.') ?></p>
  <form method="post" action="options.php">
  <?php settings_fields( 'mtshoption_group' ) ?>
  <table class="widefat">
  <thead valign="top">
  <tr>
  <th scope="col" class="manage-column check-column"><input type="checkbox"></th>
  <th scope="col" class="manage-column"><?php _e('Brush Name') ?></th>
  <th scope="col" class="manage-column"><?php _e('Brush Alias(es)') ?></th>
  </tr>
  </thead>
  <tfoot valign="top">
  <tr>
  <th scope="col" class="manage-column check-column"><input type="checkbox"></th>
  <th scope="col" class="manage-column"><?php _e('Brush Name') ?></th>
  <th scope="col" class="manage-column"><?php _e('Brush Alias(es)') ?></th>
  </tr>
  </tfoot>
  <?php
  $options = get_option('mtsh_brush_options');
  foreach ($mtsh_brushes as $option_name => $brush_details) {
    echo mtsh_build_row($brush_details[0], $option_name, $brush_details[1], $options[$option_name]);
  }
  ?>
  </table>
  <p class="submit">
  <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
  </p>
  </form>
  <p><?php _e('Brushes are used by specifying the alias as a class attribute for a <code>pre</code> block. For example: <code>&lt;pre class="brush:php"&gt;...PHP code...&lt;/pre&gt;</code>.') ?></p>
  <p><?php _e('Visit <a href="http://alexgorbatchev.com/wiki/SyntaxHighlighter">http://alexgorbatchev.com/wiki/SyntaxHighlighter</a> for more information.') ?></p>
  </div>
  <?php
}

function mtsh_build_row($name, $option_name, $brush_names, $option_enabled) {
  $row = "<tr valign='top' style='padding-bottom:0;'>\n";
  $row .= "<th scope='row' class='check-column'><input type='checkbox' name='mtsh_brush_options[$option_name]'";
  if ($option_enabled) {
    $row .= "checked='true'";
  }
  $row .= "/></th>\n";
  $row .= "<td>$name</td>\n";
  $row .= "<td>$brush_names</td>\n";
  $row .= "</tr>\n";
  return $row;
}

function mtsh_build_brush_array() {
  return array('mtsh_use_as3' => array(__('ActionScript'), 'actionscript, as3', 'AS3'),
               'mtsh_use_bash' => array(__('Bash'), 'bash, shell', 'Bash'),
               'mtsh_use_cpp' => array(__('C++'), 'cpp, c', 'Cpp'),
               'mtsh_use_csharp' => array(__('C#'), 'c#, c-sharp, csharp', 'CSharp'),
               'mtsh_use_css' => array(__('CSS'), 'css', 'Css'),
               'mtsh_use_delphi' => array(__('Delphi'), 'delphi, pascal', 'Delphi'),
               'mtsh_use_diff' => array(__('Diff'), 'diff, patch', 'Diff'),
               'mtsh_use_groovy' => array(__('Groovy'), 'groovy', 'Groovy'),
               'mtsh_use_java' => array(__('Java'), 'java', 'Java'),
               'mtsh_use_javafx' => array(__('JavaFX'), 'jfx, javafx', 'JavaFX'),
               'mtsh_use_jscript' => array(__('JavaScript'), 'js, jscript, javascript', 'JScript'),
               'mtsh_use_perl' => array(__('Perl'), 'perl, Perl, pl', 'Perl'),
               'mtsh_use_php' => array(__('PHP'), 'php', 'Php'),
               'mtsh_use_plain' => array(__('Plain Text'), 'text, plain', 'Plain'),
               'mtsh_use_powershell' => array(__('PowerShell'), 'powershell, ps', 'PowerShell'),
               'mtsh_use_python' => array(__('Python'), 'py, python', 'Python'),
               'mtsh_use_ruby' => array(__('Ruby'), 'ruby, rails, ror', 'Ruby'),
               'mtsh_use_scala' => array(__('Scala'), 'scala', 'Scala'),
               'mtsh_use_sql' => array(__('SQL'), 'sql', 'Sql'),
               'mtsh_use_vb' => array(__('Visual Basic'), 'vb, vbnet', 'Vb'),
               'mtsh_use_xml' => array(__('XML and HTML'), 'xml, xhtml, xslt, html', 'Xml'));
}

?>