<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('ar_title');
            $table->string('en_title');
            $table->text('ar_description');
            $table->text('en_description');
            $table->text('image');
            $table->text('images')->nullable();
            $table->text('ar_usage');
            $table->text('en_usage');
            $table->integer('status')->default(1);
            $table->foreignId('company_id')->default(1);
            $table->foreignId('cate_id')->default(1);
            $table->foreignId('created_By')->default(1);
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->foreign('created_By')->references('id')->on('users');
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
};
