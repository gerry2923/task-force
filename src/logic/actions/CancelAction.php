<?php
namespace taskforce\logic\actions;

class CancelAction extends AbstractAction
{
    public function getLabel()
    {
        return "Отменить";
    }

    public function getInternalName()
    {
        return "cancelled";
    }

    public static function checkRights($user_id, $performer_id, $customer_id) 
    {
        return $user_id == $customer_id;
    }
}