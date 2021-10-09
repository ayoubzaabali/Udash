<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserHasFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_has_files', function (Blueprint $table) {
            $table->foreign('files_id', 'fk_user_has_files_files1')->references('id')->on('files')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_user_has_files_user1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_has_files', function (Blueprint $table) {
            $table->dropForeign('fk_user_has_files_files1');
            $table->dropForeign('fk_user_has_files_user1');
        });
    }
}
