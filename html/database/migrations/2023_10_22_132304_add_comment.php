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
        Schema::create('comments', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->longText('body')->nullable();
            $table->ulid('commentable_id');
            $table->string('commentable_type', 10);
            $this->addResponsible($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
