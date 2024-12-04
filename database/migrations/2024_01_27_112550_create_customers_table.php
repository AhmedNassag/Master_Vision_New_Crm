.




<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('notes')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('national_id')->nullable();
            $table->string('firebase_token')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('area_id')->nullable()->constrained('areas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('contact_source_id')->nullable()->constrained('contact_sources')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('contact_category_id')->nullable()->constrained('contact_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('job_title_id')->nullable()->constrained('job_titles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('industry_id')->nullable()->constrained('industries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('major_id')->nullable()->constrained('majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
