<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MessageInterface;
use App\Models\Message;

class MessageController extends Controller
{
    private $message;


    public function __construct( MessageInterface $message)
    {
        $this->message = $message;
    }

    public function store( Request $request )
    {
        $this->validate($request, [
            'message' => 'required|max:500'
        ]);

        $params = new \stdClass();
        
        $params->message = $request->message;
        
        $result = $this->message->create_message($params);

        $url = config('app.url') . '/secret/' . $result->id ;
        return response(['url' => $url], 201);



    }

    public function show($hash)
    {
        $result = $this->message->get_message($hash);
        return response(['message' => $result->message], 200);
    }




    public function index()
    {
        $messages = Message::all();
        return response()->json($messages);
    }

    


}


?>