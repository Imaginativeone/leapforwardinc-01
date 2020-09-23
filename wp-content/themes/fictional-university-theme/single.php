<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 

get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner();
    ?>

      <!-- Still within the while loop, but in HTML Mode -->

      <div class="container container--narrow page-section">

        <div class="generic-content">
          <?php the_content()?>
        </div>

      </div>
      <!-- Exit HTML Mode -->
      
    <?php 
  }

  get_footer();

?>
