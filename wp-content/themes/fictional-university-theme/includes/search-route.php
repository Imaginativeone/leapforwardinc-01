<?php
  add_action('rest_api_init', 'universityRegisterSearch');

  function universityRegisterSearch() {

    register_rest_route('university/v1', 'search', array(
      'method' => WP_REST_SERVER::READABLE, // In this case, 'GET'
      'callback' => 'universitySearchResults'
    )); // (namespace, route, associative-array)

  }

  function universitySearchResults() {
    return 'Congratulations, you created a route.';
  }
?>
