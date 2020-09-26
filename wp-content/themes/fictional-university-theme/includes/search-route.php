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
    $professors = new WP_Query(array(
      // 'post_type' => 'professor',                      // I want to search all post types
      'post_type' => array('post', 'page', 'professor'),
      // 's' => 'barksalot' // Search Argument
      's' => sanitize_text_field($data['term'])
    ));

    // return $professors->posts;

    $professorResults = array();

    while($professors->have_posts()) {
      $professors->the_post();
      array_push($professorResults, array( // Build my own custom array that contains only the exact data that I want.
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }

    return $professorResults;
  }
?>
