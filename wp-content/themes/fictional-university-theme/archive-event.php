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
      the_post();
      get_template_part('/template-parts/event', 'content');
    }
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