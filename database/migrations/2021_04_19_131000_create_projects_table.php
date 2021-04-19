<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('project_name'); 
            $table->string('project_address'); 
            $table->string('project_city'); 
            $table->string('project_state', 2); 
            $table->integer('project_zip'); 
            $table->date('project_start_date'); 
            $table->float('project_qutstanding_debt')->nullable(); 
            $table->date('project_commencement_date')->nullable(); 
            $table->tinyInteger('has_order')->nullable();  
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
        Schema::dropIfExists('projects');
    }
}
