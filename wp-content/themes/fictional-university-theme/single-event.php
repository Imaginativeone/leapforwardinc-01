<!-- Template Page for the "Events" Custom Post Type -->
Template Page for the "Events" Custom Post Type<br/>

<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 

get_header();
pageBanner(); 

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); ?>

      <!-- Still within the while loop, but in HTML Mode -->

      <div class="container container--narrow page-section">

        <div class="generic-content"><?php the_content()?></div>
        
        <?php 
          $relatedPrograms = get_field('related_programs');

          if ($relatedPrograms) {

            echo "<hr class='section-break'>";
            echo "<h2 class='headline headline--medium'>Related Program(s)</h2>";
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