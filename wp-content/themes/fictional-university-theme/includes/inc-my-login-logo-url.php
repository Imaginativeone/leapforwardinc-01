<?php 
  function my_login_logo_url() {
    return home_url();
  }

  add_filter( 'login_headerurl', 'my_login_logo_url' );
?>