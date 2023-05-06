<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('pass_country')->nullable();
            $table->string('pass_number')->nullable();
            $table->enum('ethnicity', ['white', 'hispanic', 'indian', 'asian', 'black', 'islander', 'other'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status')->default('active');
            $table->string('stripe_subscriptionId')->nullable();
            $table->string('password')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
