<?php
namespace taskforce\logic\actions;

class CancelAction extends AbstractAction
{
    public static function getLabel()
    {
        return "Отменить";
    }

    public static function getInternalName()
    {
        return "cancelled";
    }

    public static function checkRights($user_id, $performer_id, $customer_id) 
    {
        return $user_id == $customer_id;
    }
}