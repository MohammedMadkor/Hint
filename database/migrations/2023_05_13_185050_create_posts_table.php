<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('image');
            $table->foreignId('cat_id')->nullable()->constrained('categories')->nullOnDelete()->cascadeOnDelete();
            $table->longText('content');
            $table->boolean('active')->default(0);
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnDelete();
            $table->integer('viewsCount')->default(10);
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
        Schema::dropIfExists('posts');
    }
}
