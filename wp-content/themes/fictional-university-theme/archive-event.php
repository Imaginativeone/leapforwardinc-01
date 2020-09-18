<!-- Template Page for the "Events" Custom Post Type -->
<!-- Template Page for the "Events" Custom Post Type ARCHIVE<br/> -->

<?php 
  get_header(); 
  pageBanner(
    array(
      'title' => 'All Events',
      'subtitle' => 'See what is going on in our world'
    )
  );
  ?>

  <div class="container container--narrow page-section">

  <!-- See functions.php for Info on Manipulating the Default URL: pre_get_posts Hook -->

  Template Page for the "Events" Custom Post Type ARCHIVE<br/><br/>

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
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h5>
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

  <hr class="section-break">

  <p>Looking for a recap of past events? 
    <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive.</a>
  </p>
  </div>

  <?php get_footer();
?>