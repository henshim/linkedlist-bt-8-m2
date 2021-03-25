<?php

include_once 'Node.php';

class LinkedList
{
    public $count;
    public $firstNode;
    public $lastNode;

    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

    public function add($index, $data)
    {
        if ($index === 0) {
            $this->addFirst($data);
        } else {
            $node = new Node($data);
            $current = $this->firstNode;
            $previous = $this->firstNode;
            for ($i = 0; $i < $index; $i++) {
                $previous = $current;
                $current = $current->next;
            }

            $node->next = $current;
            $previous->next = $node;
            $this->count++;
        }
    }

    public function addFirst($data)
    {
        $node = new Node($data);
        $node->next = $this->firstNode;
        $this->firstNode = $node;
        $this->count++;
        if ($this->lastNode === null)
            $this->lastNode = $node;
    }

    public function addLast($data)
    {
        if ($this->firstNode === null)
            $this->addFirst($data);
        else
            $node = new Node($data);
        $this->lastNode->next = $node;
        $node->next = null;
        $this->lastNode = $node;
        $this->count++;
    }

    function totalNode()
    {
        return $this->count;
    }

    function getList()
    {
        $arr = array();
        $current = $this->firstNode;
        while ($current !== null) {
            array_push($arr, $current->readNode());
            $current = $current->next;
        }
        return $arr;
    }

    public function deleteFirst()
    {
        if ($this->firstNode != null) {
            $this->firstNode = $this->firstNode->next;
        } else {
            $this->firstNode = null;
        }
        $this->count--;
    }

    function deleteLast()
    {
        if ($this->firstNode != null) {
            if ($this->firstNode->next == null) {
                $this->firstNode = null;
                $this->count--;
            } else {
                $previous = $this->firstNode;
                $current = $this->firstNode->next;

                while ($current->next != null) {
                    $previous = $current;
                    $current = $current->next;
                }
                $previous->next = null;
                $this->count--;
            }
        }
    }

    public function delete($index)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        for ($i = 0; $i < $index; $i++) {
            $previous = $current;
            $current = $current->next;
        }
        $previous->next = $current->next;
        $this->count--;
    }

    public function get($data)
    {
        $current = $this->firstNode;

        while ($current->data != $data) {
            if ($current->next === null) {
                return null;
            } else {
                $current = $current->next;
            }
        }
        return $current;
    }

    public function indexOf($data)
    {
        $index = 0;
        $current = $this->firstNode;

        while ($current !== null) {
            if ($current->readNode() === $data) {
                $arr[] = $index;
            }
            $current = $current->next;
            $index++;
        }
        return $arr;
    }
}

$test=new LinkedList();
echo '<pre>';
print_r($test->getList());
$test->addFirst(8);
$test->addFirst(0);
$test->addFirst('start');
$test->addLast(33);
$test->addLast('end');
print_r($test->getList());

$test->add(1,5);
$test->add(2,6);
$test->add(5,7);
print_r($test->getList());

$test->deleteFirst();
print_r($test->getList());

$test->deleteLast();
print_r($test->getList());

$test->delete(4);
print_r($test->getList());

print_r($test->getList());
print_r($test->get(5));
print_r($test->indexOf(3));
print_r($test->totalNode());