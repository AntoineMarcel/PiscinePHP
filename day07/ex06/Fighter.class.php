<?php

class Fighter{
    private $name;

    function __construct($message){
        $this->name = $message;
        return;
    }
    function get_name()
    {
        return ($this->name);
    }
}
?>