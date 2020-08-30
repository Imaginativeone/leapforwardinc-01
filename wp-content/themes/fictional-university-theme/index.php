<?php 

  function myFirstFunction($parameter, $secondParameter) {
    echo $parameter, ' The answer is: ', $secondParameter*$secondParameter;
  }

  function greet($name, $favoriteColor) {
    echo "<p>Hi, my name is $name and my favorite color is $favoriteColor.</p>";
  }

  $argument = 'Hello';
  $secondArgument = 7;

  myFirstFunction($argument, $secondArgument);

  greet('John', 'Blue');
  greet('Jane', 'Green');
?>
