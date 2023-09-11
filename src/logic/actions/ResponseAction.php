<?php
namespace taskforce\logic\actions;

class ResponseAction extends AbstractAction
{
  public function getLabel()
  {
    return "Откликнуться";
  }

  public function getInternalName() 
  {
    return "response";
  }

  public static function checkRights($user_id, $performer_id,  $customer_id)
  {
    return $user_id == $performer_id;
  }
}