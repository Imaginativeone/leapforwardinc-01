<?php 
  $names = array('Doug', 'Aline', 'Dubhe', 'Gilberto');

  $count = 0;
  while($count < count($names)) {
    echo "<li>Hi, my name is $names[$count]</li>";
    $count++;
  }

?>

<!-- HTML Mode -->
<p>Hi, my name is <?php echo $names[0]; ?></p>
