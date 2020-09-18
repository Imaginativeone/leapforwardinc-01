<!-- Template Page for the "Events" Custom Post Type -->
<!-- Template Page for the "Professors" Custom Post Type<br/> -->


<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 

get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner(); ?>

      <!-- Still within the while loop, but in HTML Mode -->

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