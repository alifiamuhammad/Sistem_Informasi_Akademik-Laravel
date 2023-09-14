<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('student_id')->nullable();
            $table->integer('enrollment_id')->nullable();
            $table->float('assignment_score')->nullable('0.00');
            $table->float('midterm_score')->nullable('0.00');
            $table->float('finalterm_score')->nullable('0.00');
            $table->float('attendance_score')->nullable('0.00');
           
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marks');
    }
}
