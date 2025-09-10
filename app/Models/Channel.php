<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Channel extends Model
{
    use HasUuids;

    protected $table = 'channels';

    protected $fillable = [
        'title'
    ];
}
