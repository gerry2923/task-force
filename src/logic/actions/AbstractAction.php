<?php
namespace taskforce\logic\actions;

abstract class AbstractAction {

    abstract public static function getLabel(): string;
    abstract public static function getInternalName(): string;
    abstract public static function checkRights(int $user_id, ?int $performer_id,  ?int $customer_id): bool;
}