<?php

class Task {
  // С Т А Т У С Ы
  // Определение возможных статусов
  private const STATUS_NEW = 'new';
  private const STATUS_CANCELLED = 'cancelled';
  private const STATUS_IN_PROCESS = 'in-process';
  private const STATUS_EXECUTED = 'executed';
  private const STATUS_FAILED = 'failed';

  // Д Е Й С Т В И Я
  // Орпеделение возможных действий заказчика
  private const ACTION_CANCELL = 'cancelled'; // отменить
  private const ACTION_EXECUTE = 'executed';  // выполнено
  // Определение возможный действий исполнителя
  private const ACTION_REFUSE = 'refused';  // отказаться
  private const ACTION_RESPOND = 'responded'; // откликнуться

  // С В О Й С Т В А 
  private $status;
  private $action = array();
  private $id_customer;
  private $id_performer;

  private $status_array = [ STATUS_NEW => 'новое',
                            STATUS_CANCELLED => 'отменено',
                            STATUS_IN_PROCESS => 'в работе',
                            STATUS_EXECUTED => 'выполнено',
                            STATUS_FAILED => 'провалено'];

  private $action_array = [ ACTION_CANCELL => 'отменить',
                            ACTION_EXECUTE => 'выполнено',
                            ACTION_REFUSE => 'отказаться',
                            ACTION_RESPOND => 'откликнуться'];


  public function __construct(int $id_customer, int $id_performer = null) {
    $this->id_customer = $id_customer;
    $this->id_performer = $id_performer; 

    if(is_null($this->id_performer)) {
      $status = 'new';
      
    } else {
      $status = 'in-process';

    }



  }

  public function showAllStatuses() {
    return array_values($status_array);
  }

  public function showAllActions() {
    return array_values($action_array);
  }

  public function showCurrentStatus() {
    return $status;
  }

  public function showAvailableActions() {
    return $action;
  }

}

?>