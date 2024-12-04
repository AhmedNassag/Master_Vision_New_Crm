<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('action')->nullable();
            $table->integer('related_model_id')->nullable();
            $table->text('placeholders')->nullable();
            $table->foreignId('contact_id')->nullable()->default(1)->constrained('contacts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->default(1)->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('lead_histories');
    }
}
