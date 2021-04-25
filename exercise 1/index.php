<?php

$size = 100;

function printRow1($s) {
  echo "<tr>";
  echo "<td></td>";
  for($i = 1; $i <= $s ; $i++
   {
    echo "<td>" . $i . "</td>";
  }
  echo "</tr>";
}

function printRow($r, $s) {
    echo "<tr>";
    echo "<td>" . $r . "</td>";
    for($i = 1; $i <= $s ; $i++) 
    {
      $mult = $r * $i;
      echo "<td>" . $mult . "</td>";
    }
    echo "</tr>";
}


function printMultTable($s) {
    echo "<table style='width:100%'>";

    printRow1($s);

    for($j = 1; $j <= $s; $j++) 
    {
        printRow($j, $s);
    }
    echo "</table>";
}



printMultTable($size);

?>
