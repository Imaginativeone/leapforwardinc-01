<!-- Template Page for the "Events" Custom Post Type -->
Template Page for the "Events" Custom Post Type<br/>

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
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
              <i class="fa fa-home" aria-hidden="true"></i>Event Home
            </a>
            <!-- See functions.php -->
            <span class="metabox__main"><?php the_title(); ?></span>
          </p>
        </div>

        <div class="generic-content">
          <?php the_content()?>
        </div>

      </div>
      <!-- Exit HTML Mode -->
      
    <?php 
  }

  get_footer();

?>