<!-- Template Page for the "My Notes" Custom Post Type -->
<!-- This is the fallback page for individual PAGES (Not Posts) -->
<?php 

  if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
  }

  get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner();
  ?>

    <!-- Still within the while loop, but in HTML Mode -->

    <div class="container container--narrow page-section">
      Custom Code will go here.
    </div>


  <?php 
  }

  get_footer();

?>
