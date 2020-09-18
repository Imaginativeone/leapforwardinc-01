<?php 
  // Post Types
  function university_post_types() {
    
    register_post_type('event', array(
      'show_in_rest' => true, // Modern Editor
      'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
      // 'custom-fields' removed, using ACF now
      'rewrite' => array('slug' => 'events'), // Custom Archive URL
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Events', // Menu Item
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'all_items' => 'All Events',
        'singular_name' => 'Event'
      ),
      'menu_icon' => 'dashicons-calendar'
    ));

    register_post_type('program', array(
      'show_in_rest' => true, // Modern Editor
      'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
      // 'custom-fields' removed, using ACF now
      'rewrite' => array('slug' => 'programs'), // Custom Archive URL
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Programs', // Menu Item
        'add_new_item' => 'Add New Programs',
        'edit_item' => 'Edit Program',
        'all_items' => 'All Programs',
        'singular_name' => 'Program'
      ),
      'menu_icon' => 'dashicons-awards'
    ));

    // Professor Post Type
    // No Archive
    register_post_type('professor', array(
      'show_in_rest' => true, // Modern Editor
      'supports'     => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
      'public'       => true,
      'labels'       => array(
        'name'          => 'Professors', // Menu Item
        'add_new_item'  => 'Add New Professors',
        'edit_item'     => 'Edit Professor',
        'all_items'     => 'All Professors',
        'singular_name' => 'Professor'
      ),
      'menu_icon' => 'dashicons-welcome-learn-more'
    ));

    // Student Custom Post Type
    register_post_type('donor', array(
      'show_in_rest' => true, // Modern Editor
      'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
      // 'custom-fields' removed, using ACF now
      // 'rewrite' => array('slug' => 'donors'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Donors', // Menu Item
        'add_new_item' => 'Add New Donor',
        'edit_item' => 'Edit Donor',
        'all_items' => 'All Donors',
        'singular_name' => 'Donor'
      ),
      'menu_icon' => 'dashicons-calendar'
    ));

    // Student Custom Post Type
    register_post_type('student', array(
      'show_in_rest' => true, // Modern Editor
      'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
      // 'custom-fields' removed, using ACF now
      // 'rewrite' => array('slug' => 'students'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Students', // Menu Item
        'add_new_item' => 'Add New Student',
        'edit_item' => 'Edit Student',
        'all_items' => 'All Students',
        'singular_name' => 'Student'
      ),
      'menu_icon' => 'dashicons-calendar'
    ));

  }

  add_action('init', 'university_post_types');
?>