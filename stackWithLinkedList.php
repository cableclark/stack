<?php 

require 'Requires/linked_list.php';

interface Stack { 

    public function push(string $item); 

    public function pop(); 

    public function isEmpty(); 

}


class AlbumList implements Stack { 

    private $stack; 

    public function __construct() { 
      $this->stack = new LinkedList(); 
    }

    public function pop(): string { 

      if ($this->isEmpty()) { 
          throw new UnderflowException('Stack is empty'); 
      } else { 
          $lastItem = $this->top(); 
          $this->stack->deleteLast(); 
          return $lastItem; 
      } 
    } 

    public function push(string $newItem) { 

      $this->stack->insert($newItem); 
    } 



    public function isEmpty(): bool { 
      return empty($this->stack) == 0; 
    } 
}


try { 
    $programmingBooks = new AlbumList(); 
    $programmingBooks->push("Dirty"); 
    $programmingBooks->push("Confusion is sex"); 
    $programmingBooks->push("Washing Machine"); 
    print_r($programmingBooks);
} catch (Exception $e) { 
    echo $e->getMessage(); 
}