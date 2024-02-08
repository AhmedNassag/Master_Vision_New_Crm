<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->decimal('debt', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['draft','sent','paid','void'])->default('void')->nullable();
            $table->foreignId('customer_id')->nullable()->default(1)->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->default(1)->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interest_id')->nullable()->default(1)->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('invoices');
    }
}
