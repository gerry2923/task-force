<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Force</title>
</head>
<body>
  <?php


  error_reporting(E_ALL);
  ini_set('display_errors', 'on');
  session_start();
  define('__ROOT__', dirname(__FILE__));

  require_once(__ROOT__.'/utils.php');
  require_once(__ROOT__.'/Task.php');


  $id_custom = 251;
  $id_perform = 115;
  $some_var = new Task($id_custom);

  echo "All correct";
  vardump($some_var->getActionMap());

  echo $some_var->GetAvalibleActions($id_custom) . "<br>";
  $some_var->setPerformerId($id_perform);

  echo $some_var->GetAvalibleActions($id_perform) . "<br>";

  $some_var->getNextStatus('responded');

  echo "new status is " . $some_var->getStatus() . "<br>";


  echo $some_var->GetAvalibleActions($id_custom) . "<br>";
  echo $some_var->GetAvalibleActions($id_perform) . "<br>";
  $some_var->getNextStatus('responded');
  

  $some_var->setStatus('new');
  echo "значение константы " . Task::STATUS_CANCELLED . "<br>";

  assert($some_var->getNextStatus('executed') == Task::STATUS_CANCELLED, 'статус задания НЕ ОтМенен');
  echo "а теперь тут";
//  assert(false, 'специальная ошибка');

?>
</body>
</html>

