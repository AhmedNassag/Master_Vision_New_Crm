<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->enum('ticket_type', ['Technical Issue', 'Inquiry', 'Request']);
            $table->text('description');
            $table->enum('status', ['Pending', 'Open', 'In-Progress', 'Resolved']);
            $table->enum('priority', ['Low', 'Medium', 'High']);
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interest_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('assigned_agent_id')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('tickets');
    }
}
