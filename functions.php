<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',          // Utility functions
  'lib/init.php',           // Initial theme setup and constants
  'lib/wrapper.php',        // Theme wrapper class
  'lib/sidebar.php',        // Sidebar class
  'lib/config.php',         // Configuration
  'lib/activation.php',     // Theme activation
  'lib/titles.php',         // Page titles
  'lib/nav.php',            // Custom nav modifications
  'lib/gallery.php',        // Custom [gallery] modifications
  'lib/comments.php',       // Custom comments modifications
  'lib/scripts.php',        // Scripts and stylesheets
  'lib/extras.php',         // Custom functions
  'lib/pagination.php',     // Boostrap pagination
  'lib/lsb-mime-types.php', // Custom upload mime types
  'lib/rewrite.php',        // Custom rewrite rules
  'lib/feed-util.php',            // Custom rss rules
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Initialize custom functionality
new LsbFeedUtil();

if(!function_exists('_log')){
  function _log( $message ) {
    if( WP_DEBUG === true ){
      if( is_array( $message ) || is_object( $message ) ){
        error_log( print_r( $message, true ) );
      } else {
        error_log( $message );
      }
    }
  }
}

new LsbMimeTypes();

function capitalize_title( $term_title ) {
  return ucfirst($term_title);
}
add_filter ( 'single_term_title', 'capitalize_title', 0 );
