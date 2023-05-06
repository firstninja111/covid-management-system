<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('type_id');
            $table->dateTime('s_time');
            $table->string('symptoms')->nullable();
            $table->enum('status', ['scheduled', 'done'])->nullable();
            $table->enum('payment_status', ['Paid', 'Declined', 'Cancelled', ''])->nullable();
            $table->enum('result', ['Positive', 'Negative'])->nullable();
            $table->string('pdf')->nullable();
            $table->dateTime('collected_time')->nullable();
            $table->dateTime('reported_time')->nullable();
            $table->string('app_str');
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
        Schema::dropIfExists('appointments');
    }
}
