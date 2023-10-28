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
        Schema::create('attachmentables', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('attachmentable_id');
            $table->string('attachmentable_type', 10);
            $this->addResponsible($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
