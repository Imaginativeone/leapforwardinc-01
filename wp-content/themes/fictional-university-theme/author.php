<?php 

  // $objCurrentUser = wp_get_current_user();
  // $currentUser   = $objCurrentUser->user_login;
  // $currentUserID = $objCurrentUser->ID;

  get_header(); 

  // $modified_header_title = 'Author Page For: ' . $currentUser;

  pageBanner(
    array(
      'title' => $modified_header_title,
      // 'subtitle' => 'Hi, this is the subtitle',
      'photo' => 'https://www.tvinsider.com/wp-content/uploads/2018/02/Station-19-Jaina-Lee-Ortiz-1014x570.jpg'
  )
  );
  ?>

  <div class="container container--narrow page-section">

  <?php 
    while(have_posts()) {
      the_post(); ?>

      <div class="post-item">
      
        <h2 class="headline headline--medium headline--post-title">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>

        <div class="metabox">
          <p>Posted by 
            <?php the_author_posts_link(); ?> on 
            <?php the_time('n.j.y'); ?> in 
            <?php echo get_the_category_list(', '); ?>
          </p>
        </div>

        <div class="generic-content">
          <?php the_excerpt(); ?>
          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
        </div>

      </div>

    <?php }
  ?>

  <!-- Pagination -->
  <?php echo paginate_links(); ?>

  </div>

  <?php get_footer();
?>