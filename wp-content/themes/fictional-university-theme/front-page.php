<?php 

  // <!-- This code pulls in the contents of header.php -->
  get_header(); ?>

  <!-- // Begin HTML Mode -->
  <div class="page-banner">
    <!-- Use WordPress to locate the image -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">Welcome!</h1>
      <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
      <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
      <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue">Find Your Major</a>
      <br/>
      <?php 
        // $subscribers = get_users([
        //   'role__in' => ['administrator', 'subscriber', 'student']
        // ]);

        // foreach($subscribers as $user) {
        //   // print_r($user);
        //   echo $user->user_nicename . "<br/>";
        // }
      ?>
    </div>
  </div>

  <div class="full-width-split group">
    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <!-- Event (CPT) Posts -->
        <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

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
                )
              )
            )
          );

          while($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
            // <!-- Template Code -->
            get_template_part('/template-parts/event','content');
          }
        ?>
        <p class="t-center no-margin">
          <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events
          </a>
        </p>
      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">

        <!-- Custom Query -->
        <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
        <!-- Hello World. Testing 123 -->
        <?php 

          // Custom Query
          $homepagePosts = new WP_Query(
            array(
              'posts_per_page' => 2
              // 'post_type' => 'post',
              // 'category_name'  => 'awards'
            )
          );

          while($homepagePosts->have_posts()) { // replaced have_posts()
            $homepagePosts->the_post(); ?>
            <!-- <li><?php the_title(); ?></li> --><!-- Home Static Page (no parameters) -->
            <div class="event-summary">
              <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php the_time('M'); ?></span>
                <span class="event-summary__day"><?php the_time('d'); ?></span>
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title() ?>
                  </a>
                </h5>
                <p>
                  <!-- Nuanced Excerpt -->
                  <?php 
                    if (has_excerpt()) {
                      echo get_the_excerpt();
                    } else {
                      echo wp_trim_words(get_the_content(), 18);
                    }
                  ?>
                  <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                </p>
                <!-- <p><?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                </p> -->
                <!-- <p><?php echo wp_trim_words(get_the_content(), 18); ?>
                  <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                </p> -->
                </div>
            </div>
          <?php } wp_reset_postdata();
        ?>

        <!-- <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="#">
            <span class="event-summary__month">Jan</span>
            <span class="event-summary__day">20</span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="#">We Were Voted Best School</a></h5>
            <p>For the 100th year in a row we are voted #1. <a href="#" class="nu gray">Read more</a></p>
          </div>
        </div>

        <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="#">
            <span class="event-summary__month">Feb</span>
            <span class="event-summary__day">04</span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="#">Professors in the National Spotlight</a></h5>
            <p>Two of our professors have been in national news lately. <a href="#" class="nu gray">Read more</a></p>
          </div>
        </div> -->

        <!-- All Blog Posts -->
        <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>

      </div>
    </div>
  </div>

  <div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
      <div class="glide__slides">
        <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>);">
          <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
              <h2 class="headline headline--medium t-center">Free Transportation</h2>
              <p class="t-center">All students have free unlimited bus fare.</p>
              <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>);">
          <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
              <h2 class="headline headline--medium t-center">An Apple a Day</h2>
              <p class="t-center">Our dentistry program recommends eating apples.</p>
              <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg') ?>);">
          <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
              <h2 class="headline headline--medium t-center">Free Food</h2>
              <p class="t-center">Fictional University offers lunch plans for those in need.</p>
              <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
  </div>
  <!-- // End HTML Mode -->

  <?php get_footer();
?>