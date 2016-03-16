<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamp('year');
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competition_id')->nullable()->index();
            $table->integer('position');
            $table->string('name')->index();
            $table->timestamps();
        });

        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->nullable();
            $table->string('name');
            $table->integer('position');
            $table->boolean('command')->nullable();
            $table->string('judges')->nullable();
            $table->timestamps();
        });

        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->nullable()->index();
            $table->string('student');
            $table->string('school');
            $table->integer('position');
            $table->timestamps();
        });

        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('active');
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
        Schema::drop('competitions');
        Schema::drop('events');
        Schema::drop('divisions');
        Schema::drop('places');
        Schema::drop('schools');

    }
}
