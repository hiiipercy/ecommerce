<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            // $table->foreignId('review_id')->constrained('reviews');
            // $table->foreignId('comment_id')->constrained('comments');
            // $table->foreignId('billing_id')->constrained('billings');
            // $table->foreignId('payment_id')->constrained('payments');
            $table->string('name');
            $table->string('description');
            $table->string('pre_price',100)->nullable();
            $table->string('price',100);
            $table->string('quantity')->nullable();
            $table->string('weight')->nullable();
            $table->enum('available',['1','2'])->default('1')->nullable();
            $table->enum('status',['1','2'])->default('1')->nullable();
            $table->string('image')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
