<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attendees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('school_name');
            $table->string('school_year');
            $table->string('school_major');
            $table->boolean('first_hackathon');
            $table->string('shirt_size');
            $table->text('resume_url');
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('dietary')->nullable();
            $table->string('qr_code')->nullable();
            $table->dateTime('registration_date');
            $table->integer('confirmations_sent')->default(0);
            $table->boolean('checked_in')->default(false);
            $table->boolean('rsvp')->default(false);
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
        //
    }
}
