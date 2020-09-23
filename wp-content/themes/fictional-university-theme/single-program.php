<!-- Template Page for the "Programs" Custom Post Type -->
<!-- Template Page for the "Programs" Custom Post Type<br/> -->

<!-- This is the fallback page for individual POSTS (Not Pages) -->
<?php 

get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner(); ?>

      <!-- Still within the while loop, but in HTML Mode -->

      <div class="container container--narrow page-section">

        Template Page for the "Program" Custom Post Type<br/><br/>

        <div class="generic-content"><?php the_content()?></div>

        <!-- Just need to add on ONE extra filter -->
        <?php 

          // Add Professors Here

            // Custom Query with Ordering and Sorting
            $relatedProfessors = new WP_Query(
              array(
                'posts_per_page' => -1, // 2
                'post_type'      => 'professor',
                'orderby'        => 'title', // formerly 'post_date', 'rand', meta_value !event_date
                'order'          => 'ASC',
                'meta_query'     => array( // eliminate non-adherents to sub-query
                  array(
                    'key' => 'related_programs', // Need to serialize the string of text
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_id() . '"'
                  )
                )
              )
            );

            if ($relatedProfessors->have_posts()) {
              echo "<hr class='section-break'>";
              // echo "<h2 class='headline headline--medium'>Upcoming " . get_the_title() ." Events</h2>";
              echo "<h2 class='headline headline--medium'>" . get_the_title() ." Professors</h2>";
    
              echo "<ul class='professor-cards'>";

              while($relatedProfessors->have_posts()) {
                $relatedProfessors->the_post(); ?>
                <!-- Beg of Professors Listing -->
                <li class="professor-card__list-item"><!-- Each Professor -->
                  <a class="professor-card" href="<?php the_permalink(); ?> ">
                    <img class="professor-card__image" src="<?php the_post_thumbnail_url('professor-landscape'); ?>">
                    <span class="professor-card__name"><?php the_title(); ?></span>
                  </a>
                </li>
                <!-- End of Professors Listing -->
                <?php 
              }

              echo "</ul>";
            }
          // End of Add Professors

          wp_reset_postdata(); // If this is missing, 2nd query does not display (Global IDs now reset)

          $today = date('Ymd');

          // Custom Query with Ordering and Sorting
          $homepageEvents = new WP_Query(
            array(
              'posts_per_page' => -1, // 2
              'post_type'      => 'event',
              'meta_key'       => 'event_date',
              'orderby'        => 'meta_value_num', // formerly 'post_date', 'rand', meta_value !event_date
              'order'          => 'ASC',
              'meta_query'     => array( // eliminate non-adherents to sub-query
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                ),
                array(
                  'key' => 'related_programs', // Need to serialize the string of text
                  'compare' => 'LIKE',
                  'value' => '"' . get_the_id() . '"'
                )
              )
            )
          );

          if ($homepageEvents->have_posts()) {
            echo "<hr class='section-break'>";
            echo "<h2 class='headline headline--medium'>Upcoming " . get_the_title() ." Events</h2>";
  
            while($homepageEvents->have_posts()) {
              $homepageEvents->the_post();
              get_template_part('/template-parts/event', 'content'); 
            }  
          }
        ?>

      </div>
      <!-- Exit HTML Mode -->
      
    <?php 
  }

  get_footer();

?>