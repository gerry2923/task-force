<?php
namespace taskforce\logic\actions;

class DenyAction extends AbstractAction
{
  public static function getLabel()
  {
    return "Отказать";
  }

  public static function getInternalName() 
  {
    return "deny";
  }

  public static function checkRights($user_id, $performer_id,  $customer_id)
  {
    return $user_id == $performer_id;
  }
}