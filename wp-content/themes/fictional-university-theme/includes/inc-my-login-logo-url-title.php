<?php 
  function my_login_logo_url_title() {
    // return 'Leap Forward';
    return get_bloginfo('name');
  }

  add_filter( 'login_headertitle', 'my_login_logo_url_title' );
?>