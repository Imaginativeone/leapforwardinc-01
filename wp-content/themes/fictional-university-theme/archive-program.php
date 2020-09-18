<!-- Template Page for the "Programs" Custom Post Type -->
<!-- Template Page for the "Programs" Custom Post Type ARCHIVE<br/> -->

<?php 
  get_header(); 
  pageBanner(
    array(
      'title' => 'All Programs',
      'subtitle' => 'There is something for everyone. Have a look around.'
    )
  );
  
  ?>

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