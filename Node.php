<?php


class Node
{
    public $data=null;
    public $next=null;

    public function __construct($data=null){
        $this->data=$data;
        $this->next=null;
    }

    function readNode(){
        return $this->data;
    }
}