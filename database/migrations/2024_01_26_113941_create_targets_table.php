<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount_target', 10, 2)->nullable();
            $table->integer('calls_target')->nullable();
            $table->foreignId('employee_id')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('employee_target_id')->nullable()->constrained('employee_targets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interest_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('targets');
    }
}
