<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_targets', function (Blueprint $table) {
            $table->id();
            $table->string('month')->nullable();
            $table->decimal('target_amount', 10, 3)->nullable();
            $table->integer('target_meeting')->nullable();
            $table->foreignId('employee_id')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('employee_targets');
    }
}
