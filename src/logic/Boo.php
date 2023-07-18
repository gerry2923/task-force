<?php
namespace taskforce\logic\booling;

class Boo {

  private  $word;

  public function __construct(string $yourWord)
  {
    $this->word = $yourWord;
  }


  public function getMyWord()
  {
    return $this->word;
  }
}