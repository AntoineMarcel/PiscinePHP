<?php

class UnholyFactory{

    private $soldats = array();

    function absorb($class){
        if (method_exists($class, 'get_name'))
        {
            if (isset($this->$soldats[$class->get_name()]))
                print("(Factory already absorbed a fighter of type " . $class->get_name() . ")" . PHP_EOL);
            else
                print("(Factory absorbed a fighter of type " . $class->get_name() . ")" . PHP_EOL);
                $this->$soldats[$class->get_name()] = $class;
        }
        else
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        return;
    }

    function fabricate($requested_fighters)
    {
        if (isset($this->$soldats[$requested_fighters]))
        {
            print("(Factory fabricates a fighter of type ". $requested_fighters . ")" . PHP_EOL);
            return ($this->$soldats[$requested_fighters]);
        }
        else
            print("(Factory hasn't absorbed any fighter of type ". $requested_fighters . ")" . PHP_EOL);
    }
}

?>