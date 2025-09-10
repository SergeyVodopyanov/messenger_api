<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'servers';

    protected $fillable = [
        'id',
        'title',
        'image_path',
        'invitation_link'
    ];

    protected $keyType = 'string';
}
