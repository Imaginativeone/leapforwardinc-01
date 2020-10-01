<?php 

  // JavaScript - Functions organized into their own files
  require get_theme_file_path('/includes/search-route.php');
  require get_theme_file_path('/includes/inc-university-custom-rest.php');
  require get_theme_file_path('/includes/inc-university-files.php');
  require get_theme_file_path('/includes/inc-university-features.php');
  require get_theme_file_path('/includes/inc-university-adjust-queries.php');
  require get_theme_file_path('/includes/inc-page-banner.php');
  require get_theme_file_path('/includes/inc-maybe-redirect.php');
  require get_theme_file_path('/includes/inc-redirect-subs-to-front-end.php'); 
  require get_theme_file_path('/includes/inc-no-subs-admin-bar.php'); // Current Development

  // Hello - B

  // Customize Login Screen
  add_filter('login_headerurl', 'ourHeaderUrl');

  function ourHeaderUrl() {
    return esc_url(site_url('/'));
  }

  add_action('login_enqueue_scripts', 'ourLoginCSS');

  function ourLoginCSS() {
    wp_enqueue_style ('our-main-styles', get_theme_file_uri('/bundled-assets/styles.63a26da0420f21ca9ebf.css'));
  }

  function my_login_logo_url() {
    return home_url();
  }

  add_filter( 'login_headerurl', 'my_login_logo_url' );

  function my_login_logo_url_title() {
      // return 'Leap Forward';
      return get_bloginfo('name');
  }

  add_filter( 'login_headertitle', 'my_login_logo_url_title' );

?>
