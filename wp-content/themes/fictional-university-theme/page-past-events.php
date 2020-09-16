<!-- Template Page for the "Events" Custom Post Type -->
Template Page for the "Past Events" Page<br/>
Convention: (page)-page-name.php<br/>

<?php 
  get_header(); ?>

    <div class="page-banner">
      <!-- <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg);"></div> -->
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div>
      <div class="page-banner__content container container--narrow">
        
        <!-- Page Title -->
        <!-- <h1 class="page-banner__title"><?php the_archive_title(); ?></h1> -->
        <h1 class="page-banner__title">Past Events</h1><!-- DF Update -->
        <!-- <h1 class="page-banner__title">Our History</h1> -->
        <div class="page-banner__intro">
          <p>A Recap of Our Past Events</p><!-- DF Update -->
        </div>
      </div>  
    </div>

  <div class="container container--narrow page-section">

  <!-- See functions.php for Info on Manipulating the Default URL: pre_get_posts Hook -->

  <?php 

    $today = date('Ymd');

    // Custom Query with Ordering and Sorting
    $pastEvents = new WP_Query(
      array(
        'posts_per_page' => 2,                // This doesn't work for pagination, only works for default queries. 
                                              // This is a custom query.
                                              // paginate_links() is working with the default query
        'paged'          => get_query_var('paged', 1),
        'post_type'      => 'event',
        'meta_key'       => 'event_date',
        'orderby'        => 'meta_value_num', // formerly 'post_date', 'rand', meta_value !event_date
        'order'          => 'ASC',
        'meta_query'     => array( // eliminate non-adherents to sub-query
          array(
            'key' => 'event_date',
            'compare' => '<',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      )
    );

    while($pastEvents->have_posts()) {
      $pastEvents->the_post(); ?>
      <!-- Beg of HTML for an Event on the Home Page -->
      <div class="event-summary">
        <!-- <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
          <span class="event-summary__month">Mar</span>
          <span class="event-summary__day">25</span>
        </a> -->
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
          <p><?php echo wp_trim_words(get_the_content(), 18); ?>
            <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
          </p>
        </div>
      </div>
      <!-- End of HTML for an Event on the Home Page -->
    <?php }
  ?>

  <!-- Pagination -->
  <?php echo paginate_links(array('total' => $pastEvents->max_num_pages)); ?>

  </div>

  <?php get_footer();
?>