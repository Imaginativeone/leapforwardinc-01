<?php 
  // Redirect subscriber accounts out of admin and onto homepage
  add_action('admin_init', 'redirectSubsToFrontEnd');
  
  function redirectSubsToFrontEnd() {

    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
      wp_redirect(site_url('/'));
      exit();
    }

  }
?>