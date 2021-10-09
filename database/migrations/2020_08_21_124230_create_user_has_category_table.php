<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_category', function (Blueprint $table) {
            $table->integer('user_id')->index('fk_user_has_category_user1_idx');
            $table->integer('category_id')->index('fk_user_has_category_category1_idx');
            $table->string('role', 45)->nullable();
            $table->primary(['user_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_category');
    }
}
