<!-- First non-template file -->
<?php

  // Load the CSS
  function university_files() {
    wp_enqueue_style( 'university_main_styles', get_stylesheet_uri());
  }

  // add_action('wp_enqueue_scripts', 'university_files'); // Two arguments (type_of_instruction, function_to_execute)
?>
