<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_files', function (Blueprint $table) {
            $table->integer('user_id')->index('fk_user_has_files_user1_idx');
            $table->integer('files_id')->index('fk_user_has_files_files1_idx');
            $table->primary(['user_id', 'files_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_files');
    }
}
