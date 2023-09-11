<?php
namespace taskforce\logic;

use taskforce\logic\actions\ResponseAction;
use taskforce\logic\actions\CancelAction;
use taskforce\logic\actions\CompleteAction;
use taskforce\logic\actions\DenyAction;


class AvailableActions {
  // С Т А Т У С Ы
  const STATUS_NEW = 'new';
  const STATUS_CANCEL = 'cancel';
  const STATUS_IN_PROGRESS = 'proceed';
  const STATUS_COMPLETE = 'complete';
  const STATUS_EXPIRED = 'expired';
// Р О Л И 
  const ROLE_CUSTOMER = "customer";
  const ROLE_PERFORMER = "performer";

  private $status = null;
  private $customerId = null;
  private $performerId = null;
  private $finishDate = null;

  /** 
   * Конструктор создает экземпляр класса Task
   * @param string $status статус Задачи
   * @param int $customerId идентификатор заказчика
   * @param int/null $performerId идентификатор исполнителя
   * 
  */
  
  public function __construct(string $status, ?int $performerId, int $customerId)
  {
    $this->setStatus($status);
    $this->performerId = $performerId;
    $this->customerId = $customerId; 
  }

  public function setFinishDate(DateTime $dt)
  {
    $curDate = new DateTime();

    if($dt > $curDate)
    {
      $this->finishDate = $dt;
    }
  }

  public function getAvailableActions(string $role, int $id)
  {
    $statusActions = $this->statusAllowedActions()[$this->status];
    $roleActions = $this->roleAllowedActions()[$role];

    $allowedActions = array_intersect($statusActions, $roleActions);

    $allowedActions = array_filter($allowedActions, 
      function ($action) use ($id) 
      {
        return $action::checkRights($id, $this->performerId, $this->customerId);
      });

    return array_values($allowedActions); // возвращает объект действия
  }

  public function getNextStatus(object $action)
  {

    // $reg_expression = "/([a-zA-Z]+[\\\])+/";
    // $class_name = preg_split($reg_expression, $action::class)[1];

    $map = [
      CompleteAction::class => self::STATUS_COMPLETE,
      CancelAction::class => self::STATUS_CANCEL,
      DenyAction::class => self::STATUS_CANCEL,
      ResponseAction::class => null
    ];
    
    return $map[$action::class];
  }

  public function setStatus(string $status)
  {
    $availableStatused = [
      self::STATUS_NEW,
      self::STATUS_CANCEL,
      self::STATUS_IN_PROGRESS,
      self::STATUS_COMPLETE,
      self::STATUS_EXPIRED
    ];


    if(in_array($status, $availableStatused))
    {
      $this->status = $status;
    }
  }

  private function roleAllowedActions()
  {
    $map = [
      self::ROLE_CUSTOMER => [CancelAction::class, CompleteAction::class],
      self::ROLE_PERFORMER => [ResponseAction::class, DenyAction::class]
    ];

    return $map;
  }

  private function statusAllowedActions()
  {
    $map = [
      self::STATUS_NEW => [CancelAction::class, ResponseAction::class],
      self::STATUS_CANCEL => [],
      self::STATUS_COMPLETE => [],
      self::STATUS_EXPIRED => [],
      self::STATUS_IN_PROGRESS => [CompleteAction::class, DenyAction::class]
    ];

    return $map;
  }

  private function getStatusMap()
  {
    $map = [
      self::STATUS_NEW => [self::STATUS_EXPIRED, self::STATUS_CANCEL],
      self::STATUS_IN_PROGRESS => [self::STATUS_CANCEL, self::STATUS_COMPLETE],
      self::STATUS_CANCEL => [],
      self::STATUS_COMPLETE => [],
      self::STATUS_EXPIRED => [self::STATUS_CANCEL]
    ];

    return $map;
  }

}
?>