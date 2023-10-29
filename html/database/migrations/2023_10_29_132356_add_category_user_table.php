<?php

use Domains\Shared\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends AbstractMigration{

    public function up(): void
    {
        Schema::create('category_user', function (Blueprint $table) {
            $table->string('category_id');
            $table->string('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_user');
    }
};
