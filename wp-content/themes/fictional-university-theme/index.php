<!-- This code pulls in the contents of header.php -->
<?php 
  get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); ?>

    <!-- Still within the while loop, but in HTML Mode -->
    <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
    <div><?php the_content()?></div>
    <hr>
    <!-- Exit HTML Mode -->

  <?php }

  get_footer();
?>
