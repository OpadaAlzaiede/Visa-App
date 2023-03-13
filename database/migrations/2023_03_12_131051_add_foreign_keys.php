<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', static function(Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('visas', static function(Blueprint $table) {
            $table->foreign('visa_type_id')->references('id')->on('visa_types');
        });

        Schema::table('residence_preferences', static function(Blueprint $table) {
            $table->foreign('visa_id')->references('id')->on('visas');
        });

        Schema::table('residence_preference_room_type', static function(Blueprint $table) {
            $table->foreign('residence_preference_id')->references('id')->on('residence_preferences');
            $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
