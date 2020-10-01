<?php 

  function pageBanner($args = NULL) {
    // PHP Logic will live here
    if (!$args['title']) {
      $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
      $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!$args['photo']) {
      $args['photo'] = get_field('page_banner_background_image');
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
    ?>
    <!-- Beg Page Banner HTML -->
    <div class="page-banner">
        <!-- <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg);"></div> -->
        <!-- <div class="page-banner__bg-image" 
          style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div> -->
        <div class="page-banner__bg-image" 
          style="background-image: url(
            <?php echo $args['photo'];?>
          );"></div>
        <div class="page-banner__bg-image" 
        style="background-image: url(
          <?php 
            $pageBannerImage = get_field('page_banner_background_image');
            echo $pageBannerImage['url'];
          ?>
        );"></div>
        <div class="page-banner__content container container--narrow">
          <!-- <h1 class="page-banner__title">Our History</h1> -->
          <h1 class="page-banner__title">
            <!-- <?php the_title(); ?> -->
            <?php echo $args['title']; ?>
          </h1>
          <div class="page-banner__intro">
            <!-- <p>DON'T FORGET TO REPLACE ME LATER</p> -->
            <p><?php echo $args['subtitle']; ?></p>
          </div>
        </div>  
      </div>
    <!-- End Page Banner HTML -->
    <?php
  }

?>