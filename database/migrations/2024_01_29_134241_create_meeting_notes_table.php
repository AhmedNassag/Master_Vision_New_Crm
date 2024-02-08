<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_notes', function (Blueprint $table) {
            $table->id();
            $table->text('notes')->nullable();
            $table->date('follow_date')->nullable()->default('2020-01-01');
            $table->foreignId('meeting_id')->nullable()->default(1)->constrained('meetings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->default(1)->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_notes');
    }
}
