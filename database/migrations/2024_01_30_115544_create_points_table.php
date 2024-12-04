<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->integer('points')->nullable();
            $table->date('expiry_date')->nullable();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_activity_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('points');
    }
}
