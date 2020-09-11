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
      wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.d3bad38e70f812bb2d67.js'), NULL, '1.0', true);
      wp_enqueue_style ('our-main-styles',    get_theme_file_uri('/bundled-assets/styles.d3bad38e70f812bb2d67.css'));
      
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
  }
  add_action('after_setup_theme', 'university_features'); // Header Title
?>
