<!-- Template Page for the "Donor" Custom Post Type -->
<!-- Template Page for the "Donor" Custom Post Type<br/> -->

<!-- This is the fallback page for individual PAGES (Not Posts) -->
<?php 

  $objCurrentUser = wp_get_current_user();
  $currentUser   = $objCurrentUser->user_login;
  $currentUserID = $objCurrentUser->ID;

  // print_r($objCurrentUser->user_login);
  // echo $currentUser;
  // echo $currentUser . ': ' . $currentUserID;
  // echo "<br/><br/>";

  // $user = new WP_User($currentUserID);
  
  // Users Query
  // $students = get_users([
  //   // 'role__in' => ['administrator', 'subscriber', 'student']
  //   'role__in' => ['student']
  // ]);

  $args = array(
    // 'numberposts' => 10,
    'post_type'   => 'student'
  );
  
  // $getCptStudents = get_posts( $args );
  // print_r($getCptStudents);

  $students = get_posts($args);

  get_header();
  
  $modified_header_title = 'Donor Page For: ' . $currentUser;

  while(have_posts()) { // Famous WordPress Loop!
    the_post(); 
    pageBanner(
      array(
        'title' => $modified_header_title,
        // 'subtitle' => 'Hi, this is the subtitle',
        'photo' => 'https://www.tvinsider.com/wp-content/uploads/2018/02/Station-19-Jaina-Lee-Ortiz-1014x570.jpg'
      )
    ); ?>

    <!-- Still within the while loop, but in HTML Mode -->
    <div class="container container--narrow page-section">

      <?php 

        echo "<hr>";

        /* <!-- Beg of Professors Listing -->
        // <li class="professor-card__list-item"><!-- Each Professor -->
        //   <a class="professor-card" href="<?php the_permalink(); ?> ">
        //     <img class="professor-card__image" src="<?php the_post_thumbnail_url('professor-landscape'); ?>">
        //     <span class="professor-card__name"><?php the_title(); ?></span>
        //   </a>
        // </li>
        // <!-- End of Professors Listing --> */

        foreach($students as $student) { ?>

          <!-- Beg of Professors Listing -->
          <li class="professor-card__list-item"><!-- Each Student -->
            <a class="professor-card" href="<?php echo site_url('/student/' . $student->post_name); ?>">
              <?php echo get_the_post_thumbnail($student->ID, 'student-miniscule', true); ?>
              <span class="professor-card__name">
                <?php echo $student->post_title ?>
              </span>
            </a>
          </li>
          
          <!-- End of Professors Listing -->

        <?php

          // echo "<li>";
          // echo $student->first_name . " " . $student->last_name;
          // echo get_avatar($student->ID, 96) . "<br/>";
          // echo "</li>";
        }

      ?>

  <?php 
  }

  get_footer();

?>
