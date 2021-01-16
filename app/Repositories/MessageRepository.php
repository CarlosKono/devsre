<?php

namespace App\Repositories;

use App\Interfaces\MessageInterface;
use App\Models\Message;

class MessageRepository  implements MessageInterface
{

    
    public function create_message($params)
    {

        $message = new Message;
        $message->message = $params->message;
        $message->save();
        return $message;
    }
    

    public function get_message($hash)
    {

        $message = Message::where('visualized', 0)->findOrFail($hash);
        $message->update(['visualized'=>1]);


        return $message;
    }
    

}


?>