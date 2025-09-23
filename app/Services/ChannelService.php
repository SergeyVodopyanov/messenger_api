<?php

namespace App\Services;

use App\Models\Channel;

class ChannelService
{
    public function show(string $id)
    {
        $channel = Channel::findOrFail($id);

        return $channel;
    }

    public function store(array $data)
    {
        $channel = Channel::create($data);

        return $channel;
    }

    public function update(string $id, array $data)
    {
        $channel = Channel::findOrFail($id);

        $channel->update($data);

        return $channel->fresh();
    }

    public function destroy(string $id)
    {
        $deleted = Channel::findOrFail($id)->delete();

        return $deleted;
    }
}
