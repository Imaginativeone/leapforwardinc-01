<?php 
  // S15V68-REST-API-New-Custom-Field
  // How do I add custom fields to the raw JSON?

  function university_custom_rest() {

    // Customize the REST API
    register_rest_field('post', 'authorName', array(
      'get_callback' => function() {
        return get_the_author();
      }
    ));
  }

  add_action('rest_api_init', 'university_custom_rest');
?>