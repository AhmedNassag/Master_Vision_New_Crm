<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReorderReminderNumberToReorderRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reorder_reminders', function (Blueprint $table) {
            if (!Schema::hasColumn('reorder_reminders', 'reorder_reminder_number')) {
                $table->string('reorder_reminder_number')->nullable();
            }
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
