<?php 

  // JavaScript - Functions organized into their own files
  require get_theme_file_path('/includes/search-route.php');
  require get_theme_file_path('/includes/inc-university-custom-rest.php');
  require get_theme_file_path('/includes/inc-university-files.php');
  require get_theme_file_path('/includes/inc-university-features.php');
  require get_theme_file_path('/includes/inc-university-adjust-queries.php');
  require get_theme_file_path('/includes/inc-page-banner.php'); // Current Development

  // Hello - A

  function maybe_redirect() {
    // if( current_user_can( 'manage_options' ) ) return;
    // wp_redirect( home_url( '/profile' ), 302 );
    // exit();
    echo "This is a potential attempt to redirect. This is a potential attempt to redirect";
    // wp_redirect( home_url( '/events' ), 302 );
    // exit();
  }

  add_action( 'load-profile.php', 'maybe_redirect' );
  // add_action( 'load-index.php',   'maybe_redirect' );

  // Redirect subscriber accounts out of admin and onto homepage
  add_action('admin_init', 'redirectSubsToFrontEnd');
  
  function redirectSubsToFrontEnd() {

    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
      wp_redirect(site_url('/'));
      exit();
    }

  }

  add_action('wp_loaded', 'noSubsAdminBar');
  
  function noSubsAdminBar() {
    $ourCurrentUser = wp_get_current_user();
    if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
      show_admin_bar(false);
    }
  }

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
