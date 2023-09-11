<?php
namespace taskforce\logic\actions;

abstract class AbstractAction {

    abstract public function getLabel();
    abstract public function getInternalName();
    abstract public static function checkRights($user_id, $performer_id,  $customer_id);
}