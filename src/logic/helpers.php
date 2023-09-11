<?php

/*** 
* @param mixed $var - объект, информацю о котором нужно посмотреть. 
*/
function vardump($var) {
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
  }


/**
 * @param string $name - имя шаблона, например landing.php
 * @param mixed $data - массив ключ-значение
 * @return string - контент страницы
 * 
 *  */  
function include_template($name, array $data = []) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}


