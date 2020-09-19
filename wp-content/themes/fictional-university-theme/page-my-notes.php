<!-- Template Page for the "My Notes" Custom Post Type -->
<!-- This is the fallback page for individual PAGES (Not Posts) -->
<?php 

  if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
  }

  get_header();

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner();
  ?>

    <!-- Still within the while loop, but in HTML Mode -->

    <div class="container container--narrow page-section">
      Custom Code will go here.
      <ul class="min-list link-list" id="my-notes">
        <!-- We want to create one list item for each note post. -->
        <?php
          // Ask the database for only the exact posts that we are interested in. 
          $userNotes = new WP_Query(
            array(
              'post_type' => 'note',
              'posts_per_page' => -1,
              'author' => get_current_user_id() // Current User
            )
          );

          while($userNotes->have_posts()) {
            $userNotes->the_post(); ?>
            
            <!-- Beg HTML -->
            <li>
              <input class="note-title-field" value="<?php echo esc_attr(get_the_title()); ?>">
              <textarea class="note-body-field"><?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?></textarea>
            </li>
            <!-- End HTML -->

            <?php
          }
        ?>
      </ul>
    </div>


  <?php 
  }

  get_footer();

?>
