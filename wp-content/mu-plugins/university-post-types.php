<?php 
  // Post Types
  function university_post_types() {
    register_post_type('event', array(
      'show_in_rest' => true, // Modern Editor
      'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
      // 'custom-fields' removed, using ACF now
      'rewrite' => array('slug' => 'events'),
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
  }

  add_action('init', 'university_post_types');
?>
