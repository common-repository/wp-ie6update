<?php
/*
Plugin Name: WP-IE6Update
Plugin URI: http://japh.com.au/plugins/wp-ie6update/
Description: Plugin for WordPress to insert the code snippet for <a href="http://IE6Update.com" target="_blank">IE6Update</a> into your WordPress pages. Read more about the IE6Update code snippet here: <a href="http://almost.done21.com/2009/04/announcing-ie6-update-help-kill-internet-explorer-6/" target="_blank">Announcing IE6 Update - Help Kill Internet Explorer 6</a>
Author: Japheth Thomson
Version: 2.0
Author URI: http://japh.com.au/
*/

add_action('wp_head', 'ie6update_header');

add_option('ie6update-background', '#ffffe1');
add_option('ie6update-border', '#666666');
add_option('ie6update-highlight', '#3399ff');
add_option('ie6update-fontColor', 'InfoText');
add_option('ie6update-fontSize', '11px');
add_option('ie6update-font', 'Bitstream Vera Sans, verdana, sans-serif');
add_option('ie6update-icons_path', '/wp-ie6update/img/');
add_option('ie6update-message', 'Internet Explorer is missing updates required to view this site. Click here to update...');
add_option('ie6update-url', 'http://www.microsoft.com/windows/internet-explorer/default.aspx');

add_action('admin_menu', 'ie6update_menu');

function ie6update_menu() {
    add_submenu_page('options-general.php', 'WP-IE6Update', 'WP-IE6Update', 8, 'wp-ie6update-options', 'ie6update_options');
}

function ie6update_options() {
    echo '<script type="text/javascript">function resetDefaults() {';
    echo ' var f = document.getElementById("ie6update-options");';
    echo ' f.elements[2].value = "#ffffe1";';
    echo ' f.elements[3].value = "#666666";';
    echo ' f.elements[4].value = "#3399ff";';
    echo ' f.elements[5].value = "InfoText";';
    echo ' f.elements[6].value = "11px";';
    echo ' f.elements[7].value = "Bitstream Vera Sans, verdana, sans-serif";';
    echo ' f.elements[8].value = "/wp-ie6update/img/";';
    echo ' f.elements[9].value = "Internet Explorer is missing updates required to view this site. Click here to update...";';
    echo ' f.elements[10].value = "http://www.microsoft.com/windows/internet-explorer/default.aspx";';
    echo ' f.submit();';
    echo ' }</script>';
    echo '<div class="wrap">'."\n";
    echo '<h2>WP-IE6Update</h2>'."\n";
    echo '<h3>Options</h3>'."\n";
    echo '<form id="ie6update-options" method="post" action="options.php">'."\n";
    wp_nonce_field('update-options');
    echo '<table class="form-table">'."\n";
    echo '    <tbody>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-background">Background</label></th>'."\n";
    echo '            <td><input type="text" size="10" value="' . get_option('ie6update-background') . '" name="ie6update-background"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-border">Border</label></th>'."\n";
    echo '            <td><input type="text" size="10" value="' . get_option('ie6update-border') . '" name="ie6update-border"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-highlight">Highlight</label></th>'."\n";
    echo '            <td><input type="text" size="10" value="' . get_option('ie6update-highlight') . '" name="ie6update-highlight"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-fontColor">Font color</label></th>'."\n";
    echo '            <td><input type="text" size="10" value="' . get_option('ie6update-fontColor') . '" name="ie6update-fontColor"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-fontSize">Font size</label></th>'."\n";
    echo '            <td><input type="text" size="10" value="' . get_option('ie6update-fontSize') . '" name="ie6update-fontSize"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-font">Font</label></th>'."\n";
    echo '            <td><input type="text" size="50" value="' . get_option('ie6update-font') . '" name="ie6update-font"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-icons_path">Icon path</label></th>'."\n";
    echo '            <td><input type="text" size="50" value="' . get_option('ie6update-icons_path') . '" name="ie6update-icons_path"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-message">Message</label></th>'."\n";
    echo '            <td><input type="text" size="100" value="' . get_option('ie6update-message') . '" name="ie6update-message"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '        <tr valign="top">'."\n";
    echo '            <th scope="row"><label for="ie6update-url">URL</label></th>'."\n";
    echo '            <td><input type="text" size="100" value="' . get_option('ie6update-url') . '" name="ie6update-url"/> </td>'."\n";
    echo '        </tr>'."\n";
    echo '    </tbody>'."\n";
    echo '</table>'."\n";
    echo '<input type="hidden" name="action" value="update" />'."\n";
    echo '<input type="hidden" name="page_options" value="ie6update-background,ie6update-border,ie6update-highlight,ie6update-fontColor,ie6update-fontSize,ie6update-font,ie6update-icons_path,ie6update-message,ie6update-url" />'."\n";
    echo '<p class="submit">'."\n";
    echo '    <input type="submit" class="button-primary" value="Save Changes" />'."\n";
    echo '    <input type="button" value="Reset to Defaults" name="defaults" class="button" onclick="resetDefaults();" />'."\n";
    echo '</p>'."\n";
    echo '</form>'."\n";
    echo '</div>'."\n";
}

function ie6update_header() {
    $output = '';
    $output .= '<!--[if IE 6]>'."\n";
    $output .= '<script type="text/javascript">'."\n";
    $output .= '    /*Load jQuery if not already loaded*/ if(typeof jQuery == \'undefined\'){ document.write("<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; }'."\n";
    $output .= '    var IE6UPDATE_OPTIONS = {'."\n";
    $output .= '        background: "' . get_option('ie6update-background') . '",'."\n";
    $output .= '        border: "' . get_option('ie6update-border') . '",'."\n";
    $output .= '        highlight: "' . get_option('ie6update-highlight') . '",'."\n";
    $output .= '        fontColor: "' . get_option('ie6update-fontColor') . '",'."\n";
    $output .= '        fontSize: "' . get_option('ie6update-fontSize') . '",'."\n";
    $output .= '        font: "' . get_option('ie6update-font') . '",'."\n";
    $output .= '        icons_path: "' . WP_PLUGIN_URL . get_option('ie6update-icons_path') . '",'."\n";
    $output .= '        message: "' . get_option('ie6update-message') . '",'."\n";
    $output .= '        url: "' . get_option('ie6update-url') . '"'."\n";
    $output .= '    }'."\n";
    $output .= '</script>'."\n";
    $output .= '<script type="text/javascript" src="http://static.ie6update.com/hosted/ie6update/ie6update.js"></script>'."\n";
    $output .= '<![endif]-->';
    print($output);
}
?>