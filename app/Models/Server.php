<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Server extends Model
{
    use HasUuids;

    protected $table = 'servers';

    protected $fillable = [
        'title',
        'image_path',
        'invitation_link'
    ];
}
