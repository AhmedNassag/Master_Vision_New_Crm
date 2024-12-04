<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_meeting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interest_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('meeting_id')->nullable()->constrained('meetings')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('interest_meetings');
    }
}
