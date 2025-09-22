<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Channel\StoreRequest;
use App\Http\Requests\Channel\UpdateRequest;
use App\Services\ChannelService;

class ChannelController extends Controller
{
    public function __construct(private ChannelService $service) {}

    public function show(string $id)
    {
        return response()->json(
            $this->service->show($id)
        );
    }

    public function store(StoreRequest $request)
    {
        return response()->json(
            $this->service->store($request->validated()),
            201
        );
    }

    public function update(string $id, UpdateRequest $request)
    {
        return response()->json(
            $this->service->update($id, $request->validated())
        );
    }

    public function destroy(string $id)
    {
        if ($this->service->destroy($id)) {
            return response()->json([
                'message' => 'Successfully deleted'
            ], 200);
        }
    }
}
