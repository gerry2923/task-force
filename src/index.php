<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Force</title>
</head>
<body>
  <?php
    require 'vendor/autoload.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    $array = [
      "key1" => "value1",
      "key2" => "value2",
      "key3" => "value3",
      "key4" => "value4",

    ];

    // vardump($array);
    // define('__ROOT__', dirname(__FILE__));
    // ini_set('include_path', __ROOT__.'/logic');
    // ini_set('assert.exception', 1);
    // session_start();
    // require_once __DIR__ . "/vendor/autoload.php";


    use taskforce\logic\AvailableActions;
    use taskforce\logic\actions\ResponseAction;
    use taskforce\logic\actions\CancelAction;
    use taskforce\logic\actions\CompleteAction;
    use taskforce\logic\actions\DenyAction;

    use taskforce\logic\booling\Boo;
    use taskforce\logic\actions\AbstractAction;

    // echo (new Boo('word HOHOHO'))->getMyWord();

  /*
    function myAutoload($class)
    {
      echo $class . "<br>";
      include(str_replace("\\", "/",$class). ".php");
    }
    spl_autoload_register('myAutoload');
    define('__ROOT__', dirname(__FILE__));
    require_once(__ROOT__.'/Task.php');
    
    spl_autoload_register(function ($class) {
      echo $class . "<br>";
      echo str_replace("\\", "/", $class) . "<br>";
      echo __DIR__ . "/logic" . "/" . str_replace("\\", "/", $class) . ".php<br>";
      // require_once  __ROOT__ . '/logic//'. $class . ".php";
      require_once __DIR__ . "/logic" . "/" . str_replace("\\", "/", $class) . ".php";
      // include(str_replace("\\", "/",$class). ".php");
    });



    $task = new Task(125);
    $id_custom = 251;
    $id_perform = 115;
    $some_var = new Task($id_custom);

    echo "All correct";
    // vardump($some_var->getActionMap());

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
    assert(false, 'специальная ошибка');
  */

   /******** */ // $layout_content = include_template("landing.php", [
    //   "title" => "TaskForce"
    // ]);

    // print($layout_content);

   /******** */ 
  
  try {

    $strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);
    $nextStatus = $strategy->getNextStatus(new ResponseAction());
    echo $nextStatus;
  } catch (StatusActionException $e) {
    die($e->getMessage());
  }

  var_dump($strategy->getAvailableActions(AvailableActions::ROLE_CUSTOMER, 1));
  ?>

  <h3>Hello people!</h3>
</body>
</html>

