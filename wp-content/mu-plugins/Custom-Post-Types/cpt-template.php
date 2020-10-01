<?php 
  // 01. CPT Post Type (Template)
  register_post_type('cpt', array(            // 02
    'show_in_rest' => true,                   // 03 Modern Editor
    // 'capability_type' => 'cpt',            // 04 'cpt' permissions, 'post' by default, see next line
    // 'map_meta_cap'    => true,             // 05 These two lines add 'CPTs' to the Members Plugin
    'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
    // 'custom-fields' removed, using ACF now
    // 'rewrite' => array('slug' => 'cpts'), // Custom Archive URL
    'has_archive' => true,
    'public' => true,                        // Usually true
    'show_ui' => true, 
    'labels' => array(
      'name' => 'CPTs',                      // Menu Item
      'add_new_item' => 'Add New CPT',
      'edit_item' => 'Edit CPT',
      'all_items' => 'All CPTs',
      'singular_name' => 'CPT'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));
?>