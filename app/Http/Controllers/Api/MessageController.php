<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessage()
    {
        $message = Message::where(['status'=>'active'])->orderBy('id','DESC')->paginate(10);
        return response()->json([
            'status'=>'success',
            'messages'=> MessageResource::collection($message),
        ],200);
    }
}
