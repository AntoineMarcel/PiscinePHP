<?php

class NightsWatch{

    public function fight()
    {
        
    }

    public function recruit($class)
    {
        if (method_exists($class, 'fight'))
            return ($class->fight());
    }
}

?>