<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReferenceResource;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function getReference()
    {
        $reference = Reference::where(['status'=>'active'])->orderBy('id','DESC')->paginate(10);
        return response()->json([
            'status'=>'success',
            'references'=> ReferenceResource::collection($reference),
        ],200);
    }
}
