<?php 

  // Post Types
  function university_post_types() {

    // Paths to mu-plugins and CPTs
    $dirPath = plugin_dir_path( __FILE__ ); // mu-plugins
    $cptPath = 'Custom-Post-Types';         // CPTs

    // Paths to Custom Post Types
    $evtPath        = '/cpt-event.php';
    $pgmPath        = '/cpt-program.php';
    $professorPath  = '/cpt-professor.php';
    $donorPath      = '/cpt-donor.php';
    $studentPath    = '/cpt-student.php';
    $notePath       = '/cpt-note.php';
    // $templatePath   = '/cpt-template.php';
  
    // echo $dirPath . $cptPath . $templatePath;

    require $dirPath . $cptPath . $evtPath;
    require $dirPath . $cptPath . $pgmPath;
    require $dirPath . $cptPath . $professorPath;
    require $dirPath . $cptPath . $donorPath;
    require $dirPath . $cptPath . $studentPath;
    require $dirPath . $cptPath . $notePath;
    // require $dirPath . $cptPath . $templatePath;

  }

  add_action('init', 'university_post_types');
?>