<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_completions', function (Blueprint $table) {
            $table->id();
            $table->string('property_name')->nullable();
            $table->foreignId('contact_id')->nullable()->constrained('contacts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('completed_by')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('contact_completions');
    }
}
