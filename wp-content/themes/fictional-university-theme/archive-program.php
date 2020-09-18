<!-- Template Page for the "Programs" Custom Post Type -->
<!-- Template Page for the "Programs" Custom Post Type ARCHIVE<br/> -->

<?php 
  get_header(); ?>

    <div class="page-banner">
      <!-- <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg);"></div> -->
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div>
      <div class="page-banner__content container container--narrow">
        
        <!-- Page Title -->
        <!-- <h1 class="page-banner__title"><?php the_archive_title(); ?></h1> -->
        <h1 class="page-banner__title">All Programs</h1>
        <!-- <h1 class="page-banner__title">Our History</h1> -->
        <div class="page-banner__intro">
          <p>There is something for everyone. Have a look around.</p>
        </div>
      </div>  
    </div>

  <div class="container container--narrow page-section">

    <!-- See functions.php for Info on Manipulating the Default URL: pre_get_posts Hook -->

    Template Page for the "Programs" Custom Post Type ARCHIVE<br/>

    <ul class="link-list min-list">

    <?php 
      while(have_posts()) {
        the_post(); ?>
        <!-- Beg of HTML for an Program on its own Archive Page -->
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <!-- End of HTML for an Program on its own Archive Page -->
      <?php }
    ?>

    </ul>

    <!-- Pagination -->
    <?php echo paginate_links(); ?>

  </div>

  <?php get_footer();
?>