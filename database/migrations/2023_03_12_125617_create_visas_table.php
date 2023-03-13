<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 100);
            $table->string('father_name', 100);
            $table->string('last_name', 100);
            $table->string('job', 100);
            $table->dateTime('arrival_date');

            $table->string('passport_number', 100);
            $table->string('issuer', 100);
            $table->date('issue_date');
            $table->date('valid_until');

            $table->unsignedBigInteger('visa_type_id');

            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('visas');
    }
}
