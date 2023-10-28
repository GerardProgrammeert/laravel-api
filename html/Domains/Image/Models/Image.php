<?php

namespace Domains\Image\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use HasUlids;
    protected $fillable = [
        'file_name',
        'title',
        'description',
    ];
}