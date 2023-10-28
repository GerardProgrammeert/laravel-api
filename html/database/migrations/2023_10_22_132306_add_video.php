<?php

use Domains\Shared\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends AbstractMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('url');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $this->addResponsible($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};