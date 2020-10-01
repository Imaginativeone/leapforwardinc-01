<?php 
  // Professor Post Type
  // No Archive
  register_post_type('professor', array(
    'show_in_rest' => true, // Modern Editor; JSON data is now visible
    'supports'     => array('title', 'editor', 'excerpt', 'thumbnail'), // CPT Excerpts now happen, 'editor' is mandatory
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
?>