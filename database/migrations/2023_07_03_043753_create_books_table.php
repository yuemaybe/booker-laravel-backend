<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->id()->comment('書本分類 ID');
            $table->string('name')->comment('分類名稱');
            $table->timestamps();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id()->comment('書本 ID');
            $table->foreignId('book_category_id')->comment('書本分類 ID')->constrained()->cascadeOnDelete();
            $table->string('name')->comment('書本名稱');
            $table->integer('price')->comment('書本售價');
            $table->string('description')->nullable()->comment('書本介紹');
            $table->timestamps();
        });

        Schema::create('book_tags', function (Blueprint $table) {
            $table->id()->comment('書本標籤 ID');
            $table->string('name')->comment('標籤名稱');
            $table->timestamps();
        });

        Schema::create('book_has_tags', function (Blueprint $table) {
            $table->foreignId('book_id')->comment('書本 ID')->constrained()->cascadeOnDelete();
            $table->foreignId('book_tag_id')->comment('書本標籤 ID')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_has_tags');
        Schema::dropIfExists('book_tags');
        Schema::dropIfExists('books');
        Schema::dropIfExists('book_categories');
    }
};
