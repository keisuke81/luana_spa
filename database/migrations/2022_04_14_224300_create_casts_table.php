<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement()->startingValue(1000000);
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nickname')->nullable();
            $table->string('living_area')->nullable();
            $table->date('birthday')->nullable();
            $table->string('occupation')->nullable();
            $table->string('img_url', 3000)->nullable();
            $table->string('best_score')->nullable();
            $table->string('length_of_golf')->nullable();
            $table->string('possible_date_round')->nullable();
            $table->string('anyone_together')->nullable();
            $table->string('transportation')->nullable();
            $table->text('self_produce')->nullable();
            $table->text('message')->nullable();
            $table->string('provider')->nullable();
            $table->string('line_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('casts');
    }
}
