<?php 
  register_post_type('event', array(
    'show_in_rest' => true, // Modern Editor
    'capability_type' => 'event', // 'event' permissions, 'post' by default, see next line
    'map_meta_cap'    => true,    // These two lines add 'Events' to the Members Plugin
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
?>