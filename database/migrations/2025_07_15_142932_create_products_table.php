<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                       // id (auto_increment)
            $table->timestamps();               // created_at, updated_at
            $table->string('name');             // name varchar
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);      // price decimal
            $table->foreignId('category_id')    // category_id int FK
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('is_publish')->default(false);
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
