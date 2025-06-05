<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->boolean('is_available')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->datetime('made_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
