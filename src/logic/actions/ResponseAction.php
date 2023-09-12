<?php
namespace taskforce\logic\actions;

class ResponseAction extends AbstractAction
{
  public static function getLabel(): string
  {
    return "Откликнуться";
  }

  public static function getInternalName(): string 
  {
    return "response";
  }

  public static function checkRights(int $user_id, ?int $performer_id,  ?int $customer_id):bool
  {
    return $user_id == $performer_id;
  }
}