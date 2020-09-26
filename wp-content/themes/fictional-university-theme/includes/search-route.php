<?php
  add_action('rest_api_init', 'universityRegisterSearch');

  function universityRegisterSearch() {

    register_rest_route('university/v1', 'search', array(
      'method' => WP_REST_SERVER::READABLE, // In this case, 'GET'
      'callback' => 'universitySearchResults'
    )); // (namespace, route, associative-array)

  }

  function universitySearchResults($data) {
    // return 'Congratulations, you created a route.';
    // return array('red', 'orange', 'yellow'); // PHP data automatically converted to JSON data
    // return array(
    //   'cat' => 'meow',
    //   'dog' => 'bark'
    // ); // PHP data automatically converted to JSON data
    
    $mainQuery = new WP_Query(array(
      // 'post_type' => 'professor',                      // I want to search all post types
      'post_type' => array('post', 'page', 'professor', 'program', 'campus', 'event'),
      // 's' => 'barksalot' // Search Argument
      's' => sanitize_text_field($data['term'])
    ));

    // return $mainQuery->posts;

    $results = array(
      'generalInfo' => array(),
      'professors' => array(),
      'programs' => array(),
      'events' => array(),
      'campuses' => array()
    );

    while($mainQuery->have_posts()) {
      $mainQuery->the_post();
      
      if (get_post_type() == 'post' OR get_post_type() == 'page') {
        array_push(
          $results['generalInfo'], 
          array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
          )
        );
      }

      if (get_post_type() == 'professor') {
        array_push(
          $results['professors'], 
          array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
          )
        );
      }

      if (get_post_type() == 'programs') {
        array_push(
          $results['programs'], 
          array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
          )
        );
      }

      if (get_post_type() == 'campus') {
        array_push(
          $results['campuses'], 
          array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
          )
        );
      }

      if (get_post_type() == 'event') {
        array_push(
          $results['events'], 
          array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
          )
        );
      }

    }

    return $results;
  }
?>
