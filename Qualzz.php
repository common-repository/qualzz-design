<?php
/*
Plugin Name:  qualzz-design
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Basic WordPress Plugin Header Comment
Version:      1
Author:       Qualzz
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/


function qualzz_jquery_tabify() {
  
   wp_enqueue_script(
        'website-tracking-js',
        'https://app.qualzz.com/assets/trackingScript/webtracking.js',
        array( 'jquery' )
    ); 
 
  wp_localize_script('website-tracking-js', 'websiteId', esc_attr( get_option( 'webid' ))  );

}

add_action('admin_menu', function() {
    add_options_page( 'qualzz plugin setting', 'Qualzz', 'manage_options', 'my-first-plugin', 'qualzz_plugin_page' );
});
add_action( 'admin_init', function() {
    register_setting( 'qualzz-plugin-settings', 'map_name' );
});
function qualzz_plugin_page() {
 ?>
   <div class="wrap">
     <form action="options.php" method="post">
       <?php
       settings_fields( 'qualzz-plugin-settings' );
       do_settings_sections( 'qualzz-plugin-settings' );
       ?>
         <table>
             
            <tr>
                <th>Webpage Id</th>
                <td><input type="text" name="webid" value="<?php echo esc_attr( get_option( 'webid' ) ); ?>"/></td>
            </tr>
        </table>
       
      <?php submit_button(); ?>
     </form>
   </div>
 <?php
}
register_setting( 'qualzz-plugin-settings', 'webid');


add_action( 'wp_enqueue_scripts', 'qualzz_jquery_tabify' );


