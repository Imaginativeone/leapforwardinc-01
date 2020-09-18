<!-- Template Page for the "Events" Custom Post Type -->

<?php 
  get_header(); 
  pageBanner(
    array(
      'title' => 'Past Events',
      'subtitle' => 'A Recap of Our Past Events'
    )
  ); 
?>

  <div class="container container--narrow page-section">

  <!-- See functions.php for Info on Manipulating the Default URL: pre_get_posts Hook -->
  Template Page for the "Past Events" Page<br/>
  Convention: (page)-page-name.php<br/><br/>

  <?php 

    $today = date('Ymd');

    // Custom Query with Ordering and Sorting
    $pastEvents = new WP_Query(
      array(
        'posts_per_page' => 2,                // This doesn't work for pagination, only works for default queries. 
                                              // This is a custom query.
                                              // paginate_links() is working with the default query
        'paged'          => get_query_var('paged', 1),
        'post_type'      => 'event',
        'meta_key'       => 'event_date',
        'orderby'        => 'meta_value_num', // formerly 'post_date', 'rand', meta_value !event_date
        'order'          => 'ASC',
        'meta_query'     => array( // eliminate non-adherents to sub-query
          array(
            'key' => 'event_date',
            'compare' => '<',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      )
    );

    while($pastEvents->have_posts()) {
      $pastEvents->the_post();
      get_template_part('/template-parts/event', 'content');
    }
  ?>

  <!-- Pagination -->
  <?php echo paginate_links(array('total' => $pastEvents->max_num_pages)); ?>

  </div>

  <?php get_footer();
?>