<?php

namespace Domains\Shared\Models;

use Carbon\Carbon;
use Domains\User\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * @property ?string $id
 * @property ?string $created_by
 * @property ?string $updated_by
 * @property ?string $deleted_by
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?Carbon $deleted_at
 */
abstract class ResponsibleModel extends Model
{
    use SoftDeletes;
    use HasUlids;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = self::getCurrentUserId();
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = self::getCurrentUserId();
            }
        });

        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = self::getCurrentUserId();
            }
        });

        static::deleting(function ($model) {
            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = self::getCurrentUserId();
                $model->save();
            }
        });
    }

    /** @return BelongsTo<\Domains\Shared\Models\User, self> */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getAttributeCreatedBy(): ?string
    {
        if (!$this->createdBy instanceof User || !is_string($this->createdBy->name)) {
            return null;
        }

        return $this->createdBy->name;
    }

    /** @return BelongsTo<User, self> */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getAttributeUpdatedBy(): ?string
    {
        if (!$this->updatedBy instanceof User || !is_string($this->updatedBy->name)) {
            return null;
        }

        return $this->updatedBy->name;
    }

    /** @return BelongsTo<User, self> */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getAttributeDeletedBy(): ?string
    {
        if (!$this->deletedBy instanceof User || !is_string($this->deletedBy->name)) {
            return null;
        }

        return $this->deletedBy->name;
    }

    public static function getCurrentUserId(): ?string
    {
        if (($user = Auth::user()) && $user instanceof User) {
            return strval($user->id);
        }

        return null;
    }
}
