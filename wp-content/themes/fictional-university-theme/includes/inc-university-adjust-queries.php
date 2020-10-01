<?php 
  function university_adjust_queries($query) {

    if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
      $query->set('posts_per_page', -1);
      $query->set('orderby',  'title');
      $query->set('order',    'ASC');
    }

    $today = date('Ymd');

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
      // $query->set('posts_per_page', '1');  // Pagination is still there
                                              // Applied Universally to all Queries! Too Powerful
      // $query->set('posts_per_page', '1');
      $query->set('meta_key', 'event_date');
      $query->set('orderby',  'meta_value_num');
      $query->set('order',    'ASC');
      $query->set('meta_query', 
        array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )        
        )
      );
    }
  }

  // See archive-event.php for info about Default Queries Adjustments
  add_action('pre_get_posts', 'university_adjust_queries');
?>