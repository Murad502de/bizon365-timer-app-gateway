<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Gift\GiftCreateRequest;
use App\Http\Requests\Api\Gift\GiftUpdateRequest;
use App\Http\Resources\Gift\GiftResource;
use App\Http\Resources\Gift\GiftsResource;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GiftController extends Controller
{
    public function index(Request $request)
    {
        return GiftsResource::collection(Gift::all());
    }
    public function create(GiftCreateRequest $request)
    {
        $gift = Gift::createGift(($request->all()));

        return $gift ? $gift->uuid : null;
    }
    public function get(Gift $gift): GiftResource
    {
        return new GiftResource($gift);
    }
    public function update(Gift $gift, GiftUpdateRequest $request)
    {
        $gift->updateGift($request->all());

        return response()->json(['message' => 'success by update'], Response::HTTP_OK);
    }
    public function delete(Gift $gift)
    {
        $gift->delete();

        return response()->json(['message' => 'success by delete'], Response::HTTP_OK);
    }
}
