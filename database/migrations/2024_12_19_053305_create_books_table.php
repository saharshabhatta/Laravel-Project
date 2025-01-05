<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('author');
        $table->string('publisher');
        $table->date('published_date');
        $table->string('genre');  
        $table->string('photo')->nullable(); 
        $table->text('description')->nullable();  
        $table->integer('stock')->default(0); 
        $table->timestamps(); 
        $table->string('isbn')->unique();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
