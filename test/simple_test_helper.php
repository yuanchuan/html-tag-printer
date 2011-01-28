<?php

  function Test($name, $pair = array()) {
    $information = $name.':  ';
    
    if ( strcmp($pair['input'], $pair['output']) == 0 ) {
      $information .= 'PASSED';
    } else {
      $information .= 'FAILED';
    }
    
    echo '<p>'.$information.'</p>';
  }
  
?>