<!-- This is the fallback page for individual PAGES (Not Posts) -->
<?php 

  get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner(
      array(
        // 'title' => 'Hello there, this is the title',
        // 'subtitle' => 'Hi, this is the subtitle',
        // 'photo' => 'https://www.tvinsider.com/wp-content/uploads/2018/02/Station-19-Jaina-Lee-Ortiz-1014x570.jpg'
      )
    ); ?>

    <!-- Still within the while loop, but in HTML Mode -->

    <div class="container container--narrow page-section">

      <!-- If the current page has a parent page -->
      <?php

        $theParent = wp_get_post_parent_ID(get_the_ID());

        if ($theParent) {
          echo "I am a child page."; ?>
          <!-- Breadcrumb Box -->
          <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
              <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>">
                <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?><!-- pass in an id -->
              </a>
              <!-- See functions.php -->
              <span class="metabox__main"><?php the_title(); ?></span>
            </p>
          </div>
          <?php
        } else {
          // echo "I am a parent page.";
        }
      ?>

      <!-- No Parent or Children Pages -->
      <?php 

        $testArray = get_pages(
          array(
            'child_of' => get_the_ID()
          )
        );

        if ($theParent or $testArray) { ?>

          <!-- Sidebar Menu -->
          <div class="page-links">
            <h2 class="page-links__title">
              <!-- Parent/Child Links -->
              <a href="<?php echo get_permalink($theParent); ?>">
                <?php echo get_the_title($theParent); ?>
              </a>
            </h2>
            <ul class="min-list">
              <?php 

                if ($theParent) {
                  $findChildrenOf = $theParent;
                } else {
                  $findChildrenOf = get_the_ID();
                }

                wp_list_pages( // Needs arguments to limit the pages; otherwise shows ALL pages
                  array(
                    'title_li'    => NULL,
                    'child_of'    => $findChildrenOf,
                    'sort_column' => 'menu_order' // Can set these in admin for respective page
                  )
                ); 
              ?>
              <!-- <li class="current_page_item"><a href="#">Our History</a></li>
              <li><a href="#">Our Goals</a></li> -->
            </ul>
          </div>

        <? }
      ?>
      
      <div class="generic-content">
        <?php the_content(); ?>
      </div>

    </div>    
    <!-- Exit HTML Mode -->

  <?php 
  }

  get_footer();

?>
