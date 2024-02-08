<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('meeting_place')->nullable();
            $table->date('meeting_date')->nullable()->default('2020-01-01');
            $table->decimal('revenue', 15, 3)->nullable()->default(0);
            $table->string('interests_ids')->nullable();
            $table->foreignId('contact_id')->nullable()->default(1)->constrained('contacts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('reply_id')->nullable()->default(1)->constrained('saved_replies')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('meetings');
    }
}
