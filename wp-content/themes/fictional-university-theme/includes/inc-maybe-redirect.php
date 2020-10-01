<?php 
  function maybe_redirect() {
    // if( current_user_can( 'manage_options' ) ) return;
    // wp_redirect( home_url( '/profile' ), 302 );
    // exit();
    echo "This is a potential attempt to redirect. This is a potential attempt to redirect";
    // wp_redirect( home_url( '/events' ), 302 );
    // exit();
  }

  add_action( 'load-profile.php', 'maybe_redirect' );
  // add_action( 'load-index.php',   'maybe_redirect' );
?>