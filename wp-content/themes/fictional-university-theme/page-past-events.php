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
        <h1 class="page-banner__title">Past Events</h1>
        <!-- <h1 class="page-banner__title">Our History</h1> -->
        <div class="page-banner__intro">
          <p>A Recap of Our Past Events</p>
        </div>
      </div>  
    </div>

  <div class="container container--narrow page-section">

  <!-- See functions.php for Info on Manipulating the Default URL: pre_get_posts Hook -->

  <?php 
    while(have_posts()) {
      the_post(); ?>
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
  <?php echo paginate_links(); ?>

  </div>

  <?php get_footer();
?>