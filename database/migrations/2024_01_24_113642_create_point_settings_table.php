<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('conversion_rate',8,2)->nullable();
            $table->decimal('sales_conversion_rate',8,2)->nullable();
            $table->integer('points')->nullable();
            $table->integer('expiry_days')->nullable();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_activity_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('point_settings');
    }
}
