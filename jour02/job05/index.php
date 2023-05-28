<?php
function estPremier($nombre) {
  if ($nombre < 2) {
    return false;
  }

  for ($i = 2; $i <= sqrt($nombre); $i++) {
    if ($nombre % $i === 0) {
      return false;
    }
  }

  return true;
}

for ($i = 2; $i <= 1000; $i++) {
  if (isset($i) && estPremier($i)) {
    echo $i . "<br />";
  }
}
?>
