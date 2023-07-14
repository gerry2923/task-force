<?php

class Task {
  // С Т А Т У С Ы
  // Определение возможных статусов
  const STATUS_NEW = 'new';
  const STATUS_CANCELLED = 'cancelled';
  const STATUS_IN_PROCESS = 'in-process';
  const STATUS_EXECUTED = 'executed';
  const STATUS_FAILED = 'failed';

  // Д Е Й С Т В И Я
  // Орпеделение возможных действий заказчика
  const ACTION_CANCELL = 'cancelled'; // отменить
  const ACTION_EXECUTE = 'executed';  // выполнено
  // Определение возможный действий исполнителя
  const ACTION_REFUSE = 'refused';  // отказаться
  const ACTION_RESPOND = 'responded'; // откликнуться

  // С В О Й С Т В А 
  private $status;
  private $action = [];
  private int $id_customer;
  private ?int $id_performer;

  private $status_array = [ self::STATUS_NEW => 'новое',
                            self::STATUS_CANCELLED => 'отменено',
                            self::STATUS_IN_PROCESS => 'в работе',
                            self::STATUS_EXECUTED => 'выполнено',
                            self::STATUS_FAILED => 'провалено'
                          ];

  private $action_array = [ self::ACTION_CANCELL => 'отменить',
                            self::ACTION_EXECUTE => 'выполнено',
                            self::ACTION_REFUSE => 'отказаться',
                            self::ACTION_RESPOND => 'откликнуться'
                          ];

  private $action_status_link_array = [
                                        self::ACTION_CANCELL => self::STATUS_CANCELLED,
                                        self::ACTION_EXECUTE => self::STATUS_EXECUTED,
                                        self::ACTION_REFUSE => self::STATUS_FAILED,
                                        self::ACTION_RESPOND => self::STATUS_IN_PROCESS
                                      ];

  
  /** 
   * Конструктор создает экземпляр класса Task
   * @param string $status статус Задачи
   * @param int $id_customer идентификатор заказчика
   * @param int/null $id_performer идентификатор исполнителя
   * 
  */
  
  public function __construct(string $status, int $id_customer, ?int $id_performer = null)
  {
    $this->id_customer = $id_customer;
    $this->id_performer = $id_performer; 
    setStatus($status);
  }

  /**
   * Устанавливает новый статус
   * @param string $status название статуса
   * @return void 
   */

  private function setStatus(string $status): void  
  {
    $this->status = in_array($status, $this->status_array)? $status : "";

  }

  /**
   * Возвращает карту всех статусов
   * @return array/null возвращает массив
   */

  public function getStatusMap(): array 
  {
    return array_values($this->status_array) ?? [];
  }

  /**
   * Метод возвращает карту всех возможных действия
   * @return array
   */

  public function getActionMap(): array 
  {
    return array_values($this->action_array) ?? [];
  }
  
  /**
   * Метод возвращает текущий статус Задачи
   * @return string
   */
  public function getStatus(): string 
  {
    return $this->status;
  }

  /**
   *
   * Метод устанавливает новый статус после определенного действия
   * @param string $action выполненное действи
   * 
   * @return string/"" возвращает название нового статуса или пустую строку
   */

  public function getNextStatus(string $action): string
  {
    return array_key_exists($action, $this->action_status_link_array) ? $this->action_status_link_array[$action] : "";
  }

/**
 * Метод возвращает возможные действия для определенной роли
 * 
 * @param string $status название статуса
 * @param int $id идентификатор заказчика или исполнителя
 * 
 * @return string/null возвращает доступные действия
 */

  public function getAvalibleActions(string $status, int $id): string
  {

    if($id)
    {
      if($status === self::STATUS_NEW)
      {
        return ($id === $id_customer) ? self::ACTION_CANCELL : self::ACTION_RESPOND;
      }

      if($status === self::STATUS_IN_PROCESS)
      {
        return($id === $id_customer) ? self::ACTION_EXECUTE : self::ACTION_REFUSE ;
      } 
    }

    return null;
  }
}

?>