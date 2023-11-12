<?php
  $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'world'
  );
  if(isset($conn)){
    echo 'La BD world está conectada';
  }
?>