<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 
  while(have_posts()) { // Famous WordPress Loop!
    the_post(); ?>

    <!-- Still within the while loop, but in HTML Mode -->
    <!-- Headline Links Removed -->
    <h2><?php the_title()?></h2>
    <div><?php the_content()?></div>
    <!-- Exit HTML Mode -->

  <?php }
?>
