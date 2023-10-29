<?php

namespace Domains\Category\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryUser extends Pivot
{
    protected $table = 'category_user'; //Not necessary to set.???
}