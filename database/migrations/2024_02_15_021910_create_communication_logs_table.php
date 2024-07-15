<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type', ['customer', 'agent']);
            $table->text('comment');
            $table->foreignId('ticket_id')->nullable()->constrained('tickets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('communication_logs');
    }
}
