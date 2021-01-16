<?php

namespace App\Interfaces;

interface MessageInterface
{
    
    public function create_message($params);

    public function get_message($hash);

}


?>