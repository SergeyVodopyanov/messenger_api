<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\IndexRequest;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    public function __construct(private RoleService $service) {}

    public function index()
    {
        return response()->json(
            $this->service->index()
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
