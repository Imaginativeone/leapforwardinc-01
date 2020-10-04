<!-- Template Page for the "Events" Custom Post Type -->
<!-- Template Page for the "Students" Custom Post Type<br/> -->


<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 

get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner(); ?>

      <!-- Still within the while loop, but in HTML Mode -->

      <div class="container container--narrow page-section">

        <!-- Template Page for the "Students" Custom Post Type<br/><br/> -->

        <!-- See single-program.php -->
        <div class="generic-content">
          <div class="row group">
            <div class="one-third"><?php the_post_thumbnail('student-portrait'); ?></div>
            <div class="two-thirds"><?php the_content(); ?></div>
          </div>
        </div>
        
      </div>
      <!-- Exit HTML Mode -->
      
    <?php 
  }

  get_footer();

?>