<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\IndexRequest;
use App\Http\Requests\Server\StoreRequest;
use App\Http\Requests\Server\UpdateRequest;
use App\Services\ServerService;

class ServerController extends Controller
{
    public function __construct(private ServerService $service) {}

    public function index(IndexRequest $request)
    {
        return response()->json(
            $this->service->index($request->validated())
        );
    }

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
