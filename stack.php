<?php

error_reporting(E_ALL ^ E_STRICT);

interface Stack {
  public function push (string $Item);
  public function pop();
  public function top();
  public function isEmpty();
}

class Records implements Stack {

  public $limit;
  public $stack;

  public function __construct (int $limit = 10) {
    $this->limit=$limit;
    $this->stack=[];
  }
  public function push (string $item) {
    if (sizeof($this->stack) < $this->limit) {
        array_push($this->stack, $item);
    } else {
        throw new UnderflowException("Stack is full");
    }
  }

  public function pop(): string {
    if ($this->isEmpty()) {
      throw new UnderflowException("Stack is empty");
    } else {
      return array_pop($this->stack);
    }
  }

  public function top(){
    return end($this->stack);

  }
  public function isEmpty(){
    return empty($this->stack);
  }

}
try {
  $myRecordCollection = new Records(20);
  $myRecordCollection->push('Slint-Spiderland');
  $myRecordCollection->push('Air-Moon Safari');
  $myRecordCollection->push('Biblical- TCTAS');
  print_r ($myRecordCollection->stack);
  print_r ($myRecordCollection->top());

} catch (\Exception $e) {
  echo $e->getMessage();
}
