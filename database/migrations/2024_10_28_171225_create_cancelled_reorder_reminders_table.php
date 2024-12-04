<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancelledReorderRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelled_reorder_reminders', function (Blueprint $table) {
            $table->id();
            $table->string('reminder_type')->nullable();
            $table->dateTime('reminder_date');
            $table->boolean('is_completed')->default(false);
            $table->unsignedBigInteger('expected_amount')->nullable();
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interest_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('reorder_reminder_number')->nullable();
            $table->string('receiptnumber')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('cancelled_reorder_reminders');
    }
}
