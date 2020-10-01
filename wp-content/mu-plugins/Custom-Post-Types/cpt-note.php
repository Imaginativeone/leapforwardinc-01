<?php 
  // 01. Note Post Type
  register_post_type('note', array(           // 02. 'note'
    'show_in_rest' => true,                   // 03. Modern Editor
    // 'capability_type' => 'cpt-template',   // 04. 'event' permissions, 'post' by default, see next line
    // 'map_meta_cap'    => true,             // 05. These two lines add 'Events' to the Members Plugin
    'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
    // 'custom-fields' removed, using ACF now
    // 'rewrite' => array('slug' => 'cpt-templates'), // Custom Archive URL
    'has_archive' => true,
    'public' => false,                        // Usually true
    'show_ui' => true, 
    'labels' => array(
      'name' => 'Notes',                      // Menu Item
      'add_new_item' => 'Add New Note',
      'edit_item' => 'Edit Note',
      'all_items' => 'All Notes',
      'singular_name' => 'Note'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));
?>