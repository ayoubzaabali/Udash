<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserHasCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_has_category', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_user_has_category_category1')->references('id')->on('category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_user_has_category_user1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_has_category', function (Blueprint $table) {
            $table->dropForeign('fk_user_has_category_category1');
            $table->dropForeign('fk_user_has_category_user1');
        });
    }
}
