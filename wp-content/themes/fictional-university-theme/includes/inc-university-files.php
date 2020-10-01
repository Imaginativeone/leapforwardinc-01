<?php 
  function university_files() {

    if (strstr($_SERVER['SERVER_NAME'], 'https://leapforward01.local/')) {

      wp_enqueue_script('main-university-javascript', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
      wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
      wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      wp_enqueue_style('university_main_styles', get_stylesheet_uri());
      wp_enqueue_script('main-university-js', 'https://localhost:3000/bundled.js', NULL, '1.0', true);
      
    } else {

      wp_enqueue_script('our-vendors-js',     get_theme_file_uri('/bundled-assets/vendors~scripts.9678b4003190d41dd438.js'), NULL, '1.0', true);
      wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.63a26da0420f21ca9ebf.js'), NULL, '1.0', true);
      wp_enqueue_style ('our-main-styles',    get_theme_file_uri('/bundled-assets/styles.63a26da0420f21ca9ebf.css'));
      
      wp_enqueue_script('main-university-javascript', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
      wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
      wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    }

    wp_localize_script('main-university-js', 'universityData', array(
      'root_url' => get_site_url()
    ));

  }

  add_action('wp_enqueue_scripts', 'university_files'); // CSS and Javascript
?>