<?php
namespace taskforce\logic\actions;

class CompleteAction extends AbstractAction
{
  public function getLabel()
  {
    return "Завершить";
  }

  public function getInternalName() 
  {
    return "complete";
  }

  public static function checkRights($user_id, $performer_id,  $customer_id)
  {
    return $user_id == $customer_id;
  }
}