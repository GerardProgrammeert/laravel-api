<?php

namespace Domains\Shared\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AbstractMigration extends Migration
{
    public function addResponsible(Blueprint $table): void
    {
        $table->ulid('created_by')->nullable();
        $table->ulid('updated_by')->nullable();
        $table->ulid('deleted_by')->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->index('deleted_at');
        $table->index('created_at');

        $table->foreign('created_by')->references('id')->on('users');
        $table->foreign('updated_by')->references('id')->on('users');
        $table->foreign('deleted_by')->references('id')->on('users');
    }
}
