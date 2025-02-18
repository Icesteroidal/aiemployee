<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAIEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('ai_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['VA', 'CommunityManager', 'Scheduler']);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ai_employees');
    }
};
