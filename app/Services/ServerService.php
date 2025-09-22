<?php

namespace App\Services;

use App\Models\Server;
use Illuminate\Support\Str;

class ServerService
{
    public function index(array $data)
    {
        $sort = $data['sort'] ?? 'created_at';
        $order = $data['order'] ?? 'desc';
        $perPage = $data['per_page'] ?? 15;
        $page = $data['page'] ?? 1;

        $servers = Server::orderBy($sort, $order)
            ->paginate($perPage, ['*'], 'page', $page);

        return $servers;
    }

    public function show(string $id)
    {
        $server = Server::findOrFail($id);

        return $server;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image_path'] = $data['image']->store('servers');
        }

        $data['invitation_link'] = Str::random(40);

        $server = Server::create($data);

        return $server;
    }

    public function update(string $id, array $data)
    {
        $server = Server::findOrFail($id);

        $server->update($data);

        return $server->fresh();
    }

    public function destroy(string $id)
    {
        $deleted = Server::findOrFail($id)->delete();

        return $deleted;
    }
}
