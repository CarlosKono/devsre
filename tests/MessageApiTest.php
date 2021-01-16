<?php

namespace Tests;

use App\Models\Message;
use TestCase;

class MessageApiTest extends TestCase
{


    public function test_can_create_message()
    {
        
        $parameters = [
            'message' => 'test'
        ];

        $this->json('POST', '/make', $parameters);
        $this->seeStatusCode(201);

    }


    public function test_can_show_message()
    {
        
    
        $message= Message::factory()->create();
        $id = $message->id;
    
        $this->json('GET', '/secret/'.$id);
        $this->seeStatusCode(200);

        $this->json('GET', '/secret/'.$id);
        $this->seeStatusCode(404);
                
       
    }
   
}