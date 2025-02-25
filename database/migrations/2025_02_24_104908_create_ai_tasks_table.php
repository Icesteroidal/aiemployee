<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('a_i_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ai_employee_id');
            $table->string('task');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->text('response')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('ai_employee_id')->references('id')->on('ai_employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('a_i_tasks');
    }
};
