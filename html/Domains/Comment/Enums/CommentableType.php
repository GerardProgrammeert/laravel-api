<?php

namespace Domains\Comment\Enums;

use Domains\Shared\Traits\EnumTrait;

enum CommentableType: string
{
    use EnumTrait;
    case VIDEO = 'video';
    case IMAGE = 'image';
    case POST ='post';

}