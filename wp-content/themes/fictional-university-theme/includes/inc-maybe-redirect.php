<?php 
  function maybe_redirect() {
    // if( current_user_can( 'manage_options' ) ) return;
    // wp_redirect( home_url( '/profile' ), 302 );
    // exit();
    echo "This is a potential attempt to redirect. This is a potential attempt to redirect";
    // wp_redirect( home_url( '/events' ), 302 );
    // exit();
    if (current_user_can( 'read_private_events' ) AND !current_user_can( 'update_core' )) {
      wp_redirect( home_url('//wp-admin/edit.php?post_type=event'));
      exit();
    }
  }

  add_action( 'load-profile.php', 'maybe_redirect' );
  // add_action( 'load-index.php',   'maybe_redirect' );
?>