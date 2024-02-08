<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('notes')->nullable();
            $table->string('gender')->nullable();
            $table->enum('status',['new','contacted','qualified','converted'])->default('new')->nullable();
            $table->boolean('is_trashed')->default(0)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('national_id')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->text('custom_attributes')->nullable();
            $table->string('code')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('area_id')->nullable()->constrained('areas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('contact_source_id')->nullable()->constrained('contact_sources')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('contact_category_id')->nullable()->constrained('contact_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('job_title_id')->nullable()->constrained('job_titles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('industry_id')->nullable()->constrained('industries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('major_id')->nullable()->constrained('majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('employee_id')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('interest_id')->nullable()->constrained('interests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('campaign_id')->nullable()->constrained('campaigns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('contacts');
    }
}
