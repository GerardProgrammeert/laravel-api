<?php

namespace Domains\Video\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'url',
        'title',
        'description',
    ];
}
