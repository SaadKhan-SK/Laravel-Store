<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('small_description');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->string('image');
            $table->decimal('discount_percentage', 5, 2);
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('vendor_id');
            $table->timestamp('publish_date')->nullable();
            $table->text('rejected_reason')->nullable();
            $table->text('tnc')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('is_approved')->default(0);
            $table->string('slug')->nullable(); 
            $table->timestamps();

            // Define foreign key relationships
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('vendor_id')->references('id')->on('users');
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