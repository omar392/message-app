<?php

namespace App\Http\Resources;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($request->user_id) {
            $data = User::find($request->user_id);
            $message = Message::find($this->id);
            $fave = $data->attachFavoriteStatus($message)->has_favorited;
        }else {
            $fave = false;
        }
        return [
            'id'=>$this->id,
            'title_ar'=>$this->title_ar,
            'title_en'=>$this->title_en,
            'message_en'=>$this->message_en,
            'message_ar'=>$this->message_ar,
            'is_favorite' => $fave
        ];
    }
}
