<!-- Template Page for the "Programs" Custom Post Type -->
Template Page for the "Programs" Custom Post Type<br/>

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
        <!-- Breadcrumb Box -->
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <!-- Instead of '/blog', I want '/events' -->
            <!-- echo get_post_type_archive_link('event'); -->
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
              <i class="fa fa-home" aria-hidden="true"></i>All Programs
            </a>
            <!-- See functions.php -->
            <span class="metabox__main"><?php the_title(); ?></span>
          </p>
        </div>

        <div class="generic-content"><?php the_content()?></div>

        <!-- Just need to add on ONE extra filter -->
        <?php 
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
              $homepageEvents->the_post(); ?>
  
              <div class="event-summary">
                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month">
                    <!-- <?php the_field('event_date'); ?></span> --><!-- CPT Date -->
                    <?php 
                      $eventDate = new DateTime(get_field('event_date')); // the_field >> get_field
                      echo $eventDate->format('M');
                    ?>
                  <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p>
                    <!-- <?php echo wp_trim_words(get_the_content(), 18); ?> -->
                    <!-- Nuanced Excerpt -->
                    <?php 
                      if (has_excerpt()) {
                        echo get_the_excerpt();
                      } else {
                        echo wp_trim_words(get_the_content(), 18);
                      }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
                  </p>
                </div>
              </div>
            <?php 
            }  
          }
        ?>

      </div>
      <!-- Exit HTML Mode -->
      
    <?php 
  }

  get_footer();

?>