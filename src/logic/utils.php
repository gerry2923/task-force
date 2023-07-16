<?php 
/*** 
* @param mixed $var - объект, информацю о котором нужно посмотреть. 
*/
function vardump($var) {
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
  }