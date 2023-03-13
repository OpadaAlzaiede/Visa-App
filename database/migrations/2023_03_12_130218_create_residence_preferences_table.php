<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidencePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence_preferences', function (Blueprint $table) {
            $table->id();

            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->integer('extra_nights')->default(0);

            $table->unsignedBigInteger('visa_id');

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
        Schema::dropIfExists('residence_preferences');
    }
}
