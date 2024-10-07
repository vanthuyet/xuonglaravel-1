<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100)->unique();
            $table->string('phone',20);
            $table->date('date_of_birth');
            $table->dateTime('hire_date');
            $table->decimal('salary',10,2);
            $table->boolean('is_active');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('manager_id');
            $table->text('address');
            $table->string('profile_picture');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
