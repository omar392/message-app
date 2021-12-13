<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavUserResource;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addToFavorite(Request $request)
    {
        $user = auth()->user();
        $user = User::findOrFail($user->id);
        $message = Message::findOrFail($request->message_id);
        $user->favorite($message);

            return response()->json([
                'status'=>'success',
                'message' => 'added Successfully',
            ], 200);

    }

    public function unToFavorite(Request $request)
    {
        $user = auth()->user();
        $user = User::findOrFail($user->id);
        $message = Message::findOrFail($request->message_id);
        $user->unfavorite($message);

            return response()->json([
                'status'=>'success',
                'message' => 'Deleted Successfully',
            ], 200);

    }


    public function getUserFavorits()
    {
        $user = auth()->user();
        $user = User::findOrFail($user->id);
        $favortemessage = $user->getFavoriteItems(Message::class)->get();
        //dd($favorteDaycares->rates->stars);
            return response()->json([
                'status'=>'success',
                'favorites' => FavUserResource::collection($favortemessage)
            ], 200);

    }
}
