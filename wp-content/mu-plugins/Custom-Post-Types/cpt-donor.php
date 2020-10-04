<?php 
  // Donor Custom Post Type
  register_post_type('donor', array(
    'show_in_rest' => true, // Modern Editor
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'), // CPT Excerpts now happen, 'editor' is mandatory
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
?>