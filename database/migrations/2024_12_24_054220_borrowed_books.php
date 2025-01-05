<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasTable('borrowed_books')) {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->timestamp('borrowed_at')->useCurrent(); 
            $table->timestamp('return_by')->nullable();
            $table->boolean('is_overdue')->default(false);
            $table->timestamps();
        });
    }
}


    public function down(): void
    {
        Schema::dropIfExists('borrowed_books');
    }
};
