<?php 
  function university_features() {
    
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocation1', 'Footer Location One');
    register_nav_menu('footerLocation2', 'Footer Location Two');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails'); // Thumbnails for Blog Posts, but not CPTs yet
                                          // See Must-Use Plugins > Professor Post Type > 'supports'->'thumbnail
    // Professors
    add_image_size('professor-landscape', 400,  260, true); // false crop
    add_image_size('professor-portrait',  480,  650, true); // false crop
    
    // Students
    add_image_size('student-landscape', 400,  260, true); // false crop
    add_image_size('student-portrait',  480,  650, true); // false crop
    add_image_size('student-miniscule', 114,  141, true); // false crop

    add_image_size('pageBanner',         1500,  350, true); // false crop
  }

  add_action('after_setup_theme', 'university_features'); // Header Title
?>