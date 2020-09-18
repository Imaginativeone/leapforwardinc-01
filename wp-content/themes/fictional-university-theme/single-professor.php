<!-- Template Page for the "Events" Custom Post Type -->
<!-- Template Page for the "Professors" Custom Post Type<br/> -->


<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 

get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); ?>

      <!-- Still within the while loop, but in HTML Mode -->
      <div class="page-banner">
        <!-- <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg);"></div> -->
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div>
        <div class="page-banner__content container container--narrow">
          <!-- <h1 class="page-banner__title">Our History</h1> -->
          <h1 class="page-banner__title"><?php the_title(); ?></h1>
          <div class="page-banner__intro">
            <p>DON'T FORGET TO REPLACE ME LATER</p>
          </div>
        </div>  
      </div>

      <div class="container container--narrow page-section">

        <!-- Template Page for the "Professors" Custom Post Type<br/><br/> -->

        <!-- See single-program.php -->
        <!-- <div class="generic-content"><?php the_post_thumbnail(); the_content(); ?></div> -->
        <div class="generic-content">
          <div class="row group">
            <div class="one-third"><?php the_post_thumbnail('professor-portrait'); ?></div>
            <div class="two-thirds"><?php the_content(); ?></div>
          </div>
        </div>
        
        <?php 
          $relatedPrograms = get_field('related_programs');

          if ($relatedPrograms) {

            echo "<hr class='section-break'>";
            echo "<h2 class='headline headline--medium'>Subject(s) Taught</h2>";
            echo "<ul class='link-list min-list'>";
  
            foreach($relatedPrograms as $program) { ?>
              
              <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
  
              <?php
            }
  
            echo "</ul>";
  
          } else {

          }

        ?>
      </div>
      <!-- Exit HTML Mode -->
      
    <?php 
  }

  get_footer();

?>