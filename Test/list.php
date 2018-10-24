<?php
$files_dir = (__DIR__ .'\tests');
$files_list = scandir($files_dir);
echo '<ol>';
foreach ($files_list as $value) {
  if ($value !='.' and $value !='..' ) {
    echo '<li><a href="test.php?name='. $value.'">'.$value.'</a></li><br>';
  }
}
echo '</ol>';