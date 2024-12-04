
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReorderRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reorder_reminders', function (Blueprint $table) {
            $table->id();
            $table->string('reminder_type')->nullable();
            $table->dateTime('reminder_date');
            $table->boolean('is_completed')->default(false);
            $table->unsignedBigInteger('expected_amount')->nullable();
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interest_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('reorder_reminders');
    }
}
