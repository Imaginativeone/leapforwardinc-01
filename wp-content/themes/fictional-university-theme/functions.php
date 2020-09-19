<?php 

  function university_files() {

    if (strstr($_SERVER['SERVER_NAME'], 'http://leapforward01.local/')) {

      wp_enqueue_script('main-university-javascript', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
      wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
      wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      wp_enqueue_style('university_main_styles', get_stylesheet_uri());
      wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
      
    } else {

      wp_enqueue_script('our-vendors-js',     get_theme_file_uri('/bundled-assets/vendors~scripts.8c97d901916ad616a264.js'), NULL, '1.0', true);
      wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.8d464591dc2348070a07.js'), NULL, '1.0', true);
      wp_enqueue_style ('our-main-styles',    get_theme_file_uri('/bundled-assets/styles.8d464591dc2348070a07.css'));
      
      wp_enqueue_script('main-university-javascript', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
      wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
      wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    }

  }

  add_action('wp_enqueue_scripts', 'university_files'); // CSS and Javascript

  function university_features() {
    
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocation1', 'Footer Location One');
    register_nav_menu('footerLocation2', 'Footer Location Two');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails'); // Thumbnails for Blog Posts, but not CPTs yet
                                          // See Must-Use Plugins > Professor Post Type > 'supports'->'thumbnail
    add_image_size('professor-landscape', 400,  260, true); // false crop
    add_image_size('professor-portrait',  480,  650, true); // false crop
    add_image_size('pageBanner',         1500,  350, true); // false crop
  }

  add_action('after_setup_theme', 'university_features'); // Header Title

  // See archive-event.php for info about Default Queries Adjustments
  // $today = date('Ymd');

  // Custom Query with Ordering and Sorting
  // $homepageEvents = new WP_Query(
  //   array(
  //     'posts_per_page' => -1, // 2
  //     'post_type'      => 'event',
  //     'meta_key'       => 'event_date',
  //     'orderby'        => 'meta_value_num', // formerly 'post_date', 'rand', meta_value !event_date
  //     'order'          => 'ASC',
  //     'meta_query'     => array( // eliminate non-adherents to sub-query
  //       array(
  //         'key' => 'event_date',
  //         'compare' => '>=',
  //         'value' => $today,
  //         'type' => 'numeric'
  //       )
  //     )
  //   )
  // );

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
    wp_enqueue_style ('our-main-styles', get_theme_file_uri('/bundled-assets/styles.8d464591dc2348070a07.css'));
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
