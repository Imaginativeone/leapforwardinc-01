<?php 

  require get_theme_file_path('/includes/search-route.php');
  require get_theme_file_path('/includes/inc-university-custom-rest.php');
  require get_theme_file_path('/includes/inc-university-files.php');
  require get_theme_file_path('/includes/inc-university-features.php'); // Current Development; Done

  // Hello

  function university_adjust_queries($query) {

    if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
      $query->set('posts_per_page', -1);
      $query->set('orderby',  'title');
      $query->set('order',    'ASC');
    }

    $today = date('Ymd');

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
      // $query->set('posts_per_page', '1');  // Pagination is still there
                                              // Applied Universally to all Queries! Too Powerful
      // $query->set('posts_per_page', '1');
      $query->set('meta_key', 'event_date');
      $query->set('orderby',  'meta_value_num');
      $query->set('order',    'ASC');
      $query->set('meta_query', 
        array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )        
        )
      );
    }
  }

  // See archive-event.php for info about Default Queries Adjustments
  add_action('pre_get_posts', 'university_adjust_queries');

  function pageBanner($args = NULL) {
    // PHP Logic will live here
    if (!$args['title']) {
      $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
      $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!$args['photo']) {
      $args['photo'] = get_field('page_banner_background_image');
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
    ?>
    <!-- Beg Page Banner HTML -->
    <div class="page-banner">
        <!-- <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg);"></div> -->
        <!-- <div class="page-banner__bg-image" 
          style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div> -->
        <div class="page-banner__bg-image" 
          style="background-image: url(
            <?php echo $args['photo'];?>
          );"></div>
        <div class="page-banner__bg-image" 
        style="background-image: url(
          <?php 
            $pageBannerImage = get_field('page_banner_background_image');
            echo $pageBannerImage['url'];
          ?>
        );"></div>
        <div class="page-banner__content container container--narrow">
          <!-- <h1 class="page-banner__title">Our History</h1> -->
          <h1 class="page-banner__title">
            <!-- <?php the_title(); ?> -->
            <?php echo $args['title']; ?>
          </h1>
          <div class="page-banner__intro">
            <!-- <p>DON'T FORGET TO REPLACE ME LATER</p> -->
            <p><?php echo $args['subtitle']; ?></p>
          </div>
        </div>  
      </div>
    <!-- End Page Banner HTML -->
    <?php
  }

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
