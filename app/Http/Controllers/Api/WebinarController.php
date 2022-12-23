<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Webinar\WebinarCreateRequest;
use App\Http\Requests\Api\Webinar\WebinarUpdateRequest;
use App\Http\Resources\Webinar\WebinarResource;
use App\Http\Resources\Webinar\WebinarsResource;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebinarController extends Controller
{
    public function index(Request $request)
    {
        return WebinarsResource::collection(Webinar::all());
    }
    public function create(WebinarCreateRequest $request)
    {
        $webinar = Webinar::createWebinar($request->all());

        return $webinar ? $webinar->uuid : null;
    }
    public function get(Webinar $webinar): WebinarResource
    {
        return new WebinarResource($webinar);
    }
    public function update(Webinar $webinar, WebinarUpdateRequest $request)
    {
        $webinar->update($request->all());

        return response()->json(['message' => 'success by update'], Response::HTTP_OK);
    }
    public function delete(Webinar $webinar)
    {
        $webinar->delete();

        return response()->json(['message' => 'success by delete'], Response::HTTP_OK);
    }
}
