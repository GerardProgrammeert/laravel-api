<?php

use Domains\Shared\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends AbstractMigration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->string('description')->nullable();
            $this->addResponsible($table);
        });

        Schema::create('category_post', function (Blueprint $table) {
            //$table->ulid('id')->primary(); TODO is this possible
            $table->ulid('category_id');
            $table->ulid('post_id');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('post_id')->references('id')->on('posts');
            $this->addResponsible($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('categories');
    }
};
