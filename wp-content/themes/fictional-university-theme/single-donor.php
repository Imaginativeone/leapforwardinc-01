Single Donor Page<br/>

<?php 

$current_user = wp_get_current_user();
  echo "Current User: " . $current_user->first_name . " " . $current_user->last_name  . "<br/>";

  $donors = get_users([
    // 'role__in' => ['administrator', 'subscriber', 'student']
    'role__in' => ['donor']
  ]);

  foreach($donors as $donor) {
    echo "<li>";
    echo $donor->first_name . " " . $donor->last_name . "<br/>";
    echo "</li>";
  }

  $students = get_users([
    // 'role__in' => ['administrator', 'subscriber', 'student']
    'role__in' => ['student']
  ]);

  echo "<hr>";

  foreach($students as $student) {
    echo "<li>";
    echo $student->first_name . " " . $student->last_name . "<br/>";
    echo "</li>";
  }

?>