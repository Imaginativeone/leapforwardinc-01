<!-- This is the fallback page for individual PAGES (Not Posts) -->
<?php 

  get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); ?>

    <!-- Still within the while loop, but in HTML Mode -->
    <!-- Headline Links Removed -->
    <h1>This is a page, not a post.</h1>
    <h2><?php the_title()?></h2>
    <div><?php the_content()?></div>
    <!-- Exit HTML Mode -->

  <?php 
  }

  get_footer();

?>
