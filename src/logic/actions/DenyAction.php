<?php
namespace taskforce\logic\actions;

class DenyAction extends AbstractAction
{
  public function getLabel()
  {
    return "Отказать";
  }

  public function getInternalName() 
  {
    return "deny";
  }

  public static function checkRights($user_id, $performer_id,  $customer_id)
  {
    return $user_id == $performer_id;
  }
}